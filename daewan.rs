use std::io;

fn inch_to_meter(inch: f64) -> f64 {
    inch * 0.0254
}

fn meter_to_inch(meter: f64) -> f64 {
    meter / 0.0254
}

fn main() {
    println!("1. 인치에서 미터로 변환");
    println!("2. 미터에서 인치로 변환");

    let mut input = String::new();
    io::stdin()
        .read_line(&mut input)
        .expect("Failed to read line");

    let choice: u32 = input.trim().parse().expect("Invalid input");

    match choice {
        1 => {
            println!("인치를 입력하세요:");
            let mut input = String::new();
            io::stdin()
                .read_line(&mut input)
                .expect("Failed to read line");

            let inch: f64 = input.trim().parse().expect("Invalid input");

            let meter = inch_to_meter(inch);
            println!("{} 인치는 {} 미터입니다.", inch, meter);
        }
        2 => {
            println!("미터를 입력하세요:");
            let mut input = String::new();
            io::stdin()
                .read_line(&mut input)
                .expect("Failed to read line");

            let meter: f64 = input.trim().parse().expect("Invalid input");

            let inch = meter_to_inch(meter);
            println!("{} 미터는 {} 인치입니다.", meter, inch);
        }
        _ => println!("잘못된 선택입니다."),
    }
}
