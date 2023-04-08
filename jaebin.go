package main

import (
	"fmt"
	"strconv"
)

func main() {
	var operator string
	var num1, num2 float64

	fmt.Println("사칙연산 계산기")
	fmt.Println("---------------------")

	fmt.Print("첫번째 숫자를 입력하세요: ")
	fmt.Scanln(&num1)

	fmt.Print("두번째 숫자를 입력하세요: ")
	fmt.Scanln(&num2)

	fmt.Print("연산자를 입력하세요 (+, -, *, /): ")
	fmt.Scanln(&operator)

	result := 0.0

	switch operator {
	case "+":
		result = num1 + num2
	case "-":
		result = num1 - num2
	case "*":
		result = num1 * num2
	case "/":
		result = num1 / num2
	default:
		fmt.Println("잘못된 연산자입니다.")
		return
	}

	fmt.Println("---------------------")
	fmt.Println(num1, operator, num2, "=", strconv.FormatFloat(result, 'f', -1, 64))
}
