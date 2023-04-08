루비(Ruby) 11008 박세진

#간단한 계산기 프로그램을 실행하기 위한 코드입니다.
puts "간단한 계산기 프로그램입니다. 수식을 입력하세요."

#사용자로부터 입력을 받아 변수 expression에 저장합니다.
expression = gets.chomp

#입력된 식을 평가하고 결과를 출력합니다. 만약 오류가 발생하면 예외 처리를 진행합니다.
begin
result = eval(expression)
puts "결과는 #{result}입니다."
rescue SyntaxError, ZeroDivisionError, NameError => e
puts "올바른 수식을 입력해주세요. 에러 내용: #{e.message}"
end
