#[macro_use] extern crate rocket;

use multi_skill::data_processing::Wrap;
use multi_skill::experiment_config::Experiment;
use multi_skill::summary::make_leaderboard;
use multi_skill::systems::SimpleEloMMR;
use rocket::serde::{Deserialize, json::Json};
use rocket::serde::Serialize;
use rocket::response::content;

static README: &'static str = include_str!("../README.md");

#[get("/")]
fn index() -> content::Html<String> {
    let html = comrak::markdown_to_html(README, &comrak::ComrakOptions::default());
    content::Html(html)
}

#[derive(Deserialize, Clone)]
#[serde(crate = "rocket::serde")]
struct Standing {
    player: String,
    low_rank: usize,
    high_rank: usize
}

#[derive(Deserialize, Clone)]
#[serde(crate = "rocket::serde")]
struct Contest {
    name: String,
    unix_time: u64,
    weight: f64,
    standings: Vec<Standing>
}

#[derive(Deserialize)]
#[serde(crate = "rocket::serde")]
struct Request {
    drift_per_day: Option<f64>,
    contests: Vec<Contest>
}

#[derive(Serialize)]
#[serde(crate = "rocket::serde")]
struct Ranking {
    player: String,
    display_ranking: i32
}

#[derive(Serialize)]
#[serde(crate = "rocket::serde")]
struct Response(Vec<Ranking>);


#[post("/", data="<req>")]
fn post(req: Json<Request>) -> Json<Vec<Ranking>> {
    let length = req.contests.iter().count();
    let mut res: Vec<multi_skill::data_processing::Contest> = req.contests.iter().map(|c|multi_skill::data_processing::Contest {
        name: c.name.clone(),
        standings: c.standings.iter().map(|s| (s.player.clone(), s.low_rank, s.high_rank)).collect(),
        url: None,
        time_seconds: c.unix_time,
        weight: c.weight
    }).collect();
    res.sort_by_key(|c| c.time_seconds);

    let mut drift_per_sec = 0.;
    if req.drift_per_day.is_some() {
        drift_per_sec = req.drift_per_day.unwrap() / (24. * 60. * 60.);
    }

    let dataset = Wrap::from_closure(length, move |i| res.get(i).unwrap().clone()).boxed();
    let default = SimpleEloMMR::default();
    let experiment = Experiment {
        mu_noob: 1500.,
        sig_noob: 350.,
        system: Box::new(SimpleEloMMR {
            beta: default.beta,
            sig_limit: default.sig_limit,
            drift_per_sec: drift_per_sec,
            transfer_speed: default.transfer_speed,
        }),
        dataset: dataset,
    };

    let result = experiment.eval(length);

    let (_, leaderboard )= make_leaderboard(&result.players, 0);
 
    let r = leaderboard.into_iter().map(|l| Ranking{player: l.handle, display_ranking: l.display_rating}).collect::<Vec<Ranking>>();

    return Json(r);
}


#[launch]
fn rocket() -> _ {
    rocket::build().mount("/", routes![index, post])
}
