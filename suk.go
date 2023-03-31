package main

import "fmt"

func celsiusToFahrenheit(celsius float64) float64 {
	// 섭씨를 화씨로 변환하는 함수
	fahrenheit := (celsius * 9 / 5) + 32
	return fahrenheit
}

func fahrenheitToCelsius(fahrenheit float64) float64 {
	// 화씨를 섭씨로 변환하는 함수
	celsius := (fahrenheit - 32) * 5 / 9
	return celsius
}

func main() {
	fmt.Println("온도 변환기에 오신 것을 환영합니다!")
	fmt.Println("1. 섭씨를 화씨로 변환")
	fmt.Println("2. 화씨를 섭씨로 변환")

	var choice string
	fmt.Print("선택하세요 (1/2): ")
	fmt.Scanln(&choice)

	if choice == "1" {
		var temperature float64
		fmt.Print("변환할 온도를 입력하세요: ")
		fmt.Scanln(&temperature)
		convertedTemperature := celsiusToFahrenheit(temperature)
		fmt.Printf("%.1fC 는 %.1fF 입니다.", temperature, convertedTemperature)
	} else if choice == "2" {
		var temperature float64
		fmt.Print("변환할 온도를 입력하세요: ")
		fmt.Scanln(&temperature)
		convertedTemperature := fahrenheitToCelsius(temperature)
		fmt.Printf("%.1fF 는 %.1fC 입니다.", temperature, convertedTemperature)
	} else {
		fmt.Println("잘못된 입력입니다. 다시 입력해주세요.")
	}
}
