루비(Ruby) 11008 박세진

require 'bigdecimal' # BigDecimal 라이브러리를 사용하기 위해 필요합니다.

# 간단한 계산기 프로그램입니다.
puts "간단한 계산기 프로그램입니다."

# 계산기 프로그램을 계속해서 사용할 수 있도록 루프를 추가합니다.
while true
  # 첫 번째 숫자를 입력받습니다.
  print "첫 번째 숫자를 입력하세요: "
  begin
    num1 = BigDecimal(gets.chomp)
    break if num1.finite? # 입력된 값이 유효한 수인지 확인합니다.
    puts "잘못된 입력입니다. 다시 입력해주세요."
  rescue ArgumentError
    puts "잘못된 입력입니다. 다시 입력해주세요."
  end
end

# 두 번째 숫자를 입력받습니다.
while true
  print "두 번째 숫자를 입력하세요: "
  begin
    num2 = BigDecimal(gets.chomp)
    break if num2.finite? # 입력된 값이 유효한 수인지 확인합니다.
    puts "잘못된 입력입니다. 다시 입력해주세요."
  rescue ArgumentError
    puts "잘못된 입력입니다. 다시 입력해주세요."
  end
end

# 사용자가 원하는 연산자를 입력받습니다.
while true
  print "어떤 연산을 수행하시겠습니까? (+, -, *, /): "
  operator = gets.chomp
  break if %w(+ - * /).include?(operator) # 입력된 연산자가 유효한지 확인합니다.
  puts "잘못된 입력입니다. 다시 입력해주세요."
end

# 계산 결과를 저장할 변수를 선언합니다.
result = nil

# 입력된 연산자에 따라 적절한 연산을 수행합니다.
case operator
when "+"
  result = num1 + num2
when "-"
  result = num1 - num2
when "*"
  result = num1 * num2
when "/"
  if num2.zero?
    puts "0으로 나눌 수 없습니다."
    exit
  end
  result = num1 / num2
end

# 결과를 출력합니다.
puts "결과: #{result.to_f}" # BigDecimal 객체를 Float로 변환하여 출력합니다.
