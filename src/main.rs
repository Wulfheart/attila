#[macro_use] extern crate rocket;
use multi_skill::systems::SimpleEloMMR;
use rocket::{serde, serde::json};
use rocket::response::content;

static README: &'static str = include_str!("../README.md");

#[get("/")]
fn index() -> content::Html<String> {
    let html = comrak::markdown_to_html(README, &comrak::ComrakOptions::default());
    content::Html(html)
}



#[launch]
fn rocket() -> _ {
    rocket::build().mount("/", routes![index])
}
