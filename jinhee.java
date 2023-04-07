package 김진희;

import java.util.InputMismatchException;
import java.util.Scanner;

public class ㅔㅔ {
	
	    public static void main(String[] args) {
	        Scanner scanner = new Scanner(System.in);

	        double firstNumber = 0;
	        double secondNumber = 0;
	        char operator;
	        try {
	            System.out.println("첫 번째 숫자를 입력하세요: ");
	            firstNumber = scanner.nextDouble();
	            System.out.println("두 번째 숫자를 입력하세요: ");
	            secondNumber = scanner.nextDouble();

	            System.out.println("연산자를 입력하세요 (+, -, *, / 중 하나): ");
	            operator = scanner.next().charAt(0);
	            if (operator != '+' && operator != '-' && operator != '*' && operator != '/') {
	                throw new IllegalArgumentException("잘못된 연산자입니다.");
	            }
	        } catch (InputMismatchException e) {
	            System.out.println("숫자를 입력하세요.");
	            return;
	        } catch (IllegalArgumentException e) {
	            System.out.println(e.getMessage());
	            return;
	        }
	        double result = 0;
	        switch (operator) {
	            case '+':
	                result = firstNumber + secondNumber;
	                break;
	            case '-':
	                result = firstNumber - secondNumber;
	                break;
	            case '*':
	                result = firstNumber * secondNumber;
	                break;
	            case '/':
	                if (secondNumber == 0) {
	                    System.out.println("0으로 나눌 수 없습니다.");
	                    return;
	                }
	                result = firstNumber / secondNumber;
	                break;
	        }
	        System.out.println("결과: " + result);
	    }
	}

