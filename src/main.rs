#[macro_use] extern crate rocket;
use multi_skill::data_processing::{Wrap, Dataset};
use multi_skill::experiment_config::Experiment;
use multi_skill::systems::{SimpleEloMMR, get_rating_system_by_name};
use rocket::serde::json::serde_json::Result;
use rocket::serde::{Deserialize, json::Json};
use rocket::serde;
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
    contests: Vec<Contest>
}

#[post("/", data="<req>")]
fn post(req: Json<Request>) -> Json<usize> {
    let length = req.contests.iter().count();
    let mut res: Vec<multi_skill::data_processing::Contest> = req.contests.iter().map(|c|multi_skill::data_processing::Contest {
        name: c.name,
        standings: c.standings.iter().map(|s| (s.player.clone(), s.low_rank, s.high_rank)).collect(),
        url: None,
        time_seconds: c.unix_time,
        weight: c.weight
    }).collect();
    res.sort_by_key(|c| c.time_seconds);


    let dataset = Wrap::from_closure(length, move |i| {
        let c = req.contests[i].clone();
        multi_skill::data_processing::Contest {
                    name: c.name,
                    standings: c.standings.iter().map(|s| (s.player.clone(), s.low_rank, s.high_rank)).collect(),
                    url: None,
                    time_seconds: c.unix_time,
                    weight: c.weight
        }
    }).boxed();
    let experiment = Experiment {
        mu_noob: 1500.,
        sig_noob: 350.,
        system: Box::new(SimpleEloMMR::default()),
        dataset: dataset,
    };

    experiment.
 
    return Json()
}



#[launch]
fn rocket() -> _ {
    rocket::build().mount("/", routes![index, post])
}
