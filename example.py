# 온도 변환기

def celsius_to_fahrenheit(celsius):
    # 섭씨를 화씨로 변환하는 함수
    fahrenheit = (celsius * 9/5) + 32
    return fahrenheit

def fahrenheit_to_celsius(fahrenheit):
    # 화씨를 섭씨로 변환하는 함수
    celsius = (fahrenheit - 32) * 5/9
    return celsius

print("온도 변환기에 오신 것을 환영합니다!")
print("1. 섭씨를 화씨로 변환")
print("2. 화씨를 섭씨로 변환")

while True:
    choice = input("선택하세요 (1/2): ")

    if choice in ('1', '2'):
        temperature = float(input("변환할 온도를 입력하세요: "))

        if choice == '1':
            converted_temperature = celsius_to_fahrenheit(temperature)
            print("{:.1f}C 는 {:.1f}F 입니다.".format(temperature, converted_temperature))

        elif choice == '2':
            converted_temperature = fahrenheit_to_celsius(temperature)
            print("{:.1f}F 는 {:.1f}C 입니다.".format(temperature, converted_temperature))
        break

    else:
        print("잘못된 입력입니다. 다시 입력해주세요.")
