import re
import lab4

def credit_card_input():
    credit_card_type = input('Please enter your credit card type (Examples: Mastercard, Visa, Discover')
    credit_card_number_value = input('Please enter your credit card number: ')

    print(credit_card_type, credit_card_number_value)
    return credit_card_number_value, credit_card_type


def check_credit_card_type(credit_card_number_value, credit_card_type):
    if credit_card_type == 'Mastercard' or credit_card_type == 'mastercard':

        tested_card_number_validation, credit_card_number, credit_card_type = \
            run_master_card_validation(credit_card_number_value, credit_card_type)
        print(tested_card_number_validation)
        credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
                                                                           credit_card_number,
                                                                           credit_card_type)
        return credit_card_number, credit_card_type

    elif credit_card_type == 'Visa' or credit_card_type == 'visa':
        tested_card_number_validation, credit_card_number, credit_card_type = \
            run_visa_card_validation(credit_card_number_value, credit_card_type)

        credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
                                                                           credit_card_number,
                                                                           credit_card_type)
        return credit_card_number, credit_card_type

    elif credit_card_type == 'Discover' or credit_card_type == 'discover':
        tested_card_number_validation, credit_card_number, credit_card_type = \
            run_discover_card_validation(credit_card_number_value, credit_card_type)

        credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
                                                                           credit_card_number,
                                                                           credit_card_type)
        return credit_card_number, credit_card_type


    else:
        print("Sorry I didn't understand what you entered, Please try Again")
        credit_card_input()


def credit_card_validation_loop(tested_card_number_validation, credit_card_number, credit_card_type):
    while not tested_card_number_validation:
        print('This is the loop test card')
        credit_card_number_value, credit_card_type = credit_card_input()

        if credit_card_type == 'Mastercard' or credit_card_type == 'mastercard':
            tested_card_number_validation, credit_card_number, credit_card_type = \
                run_master_card_validation(credit_card_number_value, credit_card_type)

        elif credit_card_type == 'Visa' or credit_card_type == 'visa':
            tested_card_number_validation, credit_card_number, credit_card_type = \
                run_visa_card_validation(credit_card_number_value, credit_card_type)

        elif credit_card_type == 'Discover' or credit_card_type == 'discover':
            tested_card_number_validation, credit_card_number, credit_card_type = \
                run_discover_card_validation(credit_card_number_value, credit_card_type)

    return credit_card_number, credit_card_type


def run_master_card_validation(credit_card_number_value, credit_card_type):
    valid_card_number = re.compile('^5[1-5][0-9]{14}$')
    matched_valid_card_number = valid_card_number.match(credit_card_number_value)
    print(matched_valid_card_number)
    if matched_valid_card_number:
        print('right master')
        return True, matched_valid_card_number.group(), credit_card_type
    else:
        print('wrong card number')
        invalid_card_number = False
        tested_card_number_validation = False
        return tested_card_number_validation, invalid_card_number, credit_card_type



def run_visa_card_validation(credit_card_number_value, credit_card_type):
    valid_card_number = re.compile('^4[0-9]{12}(?:[0-9]{3})?$')
    matched_valid_card_number = valid_card_number.match(credit_card_number_value)
    print(matched_valid_card_number)
    if matched_valid_card_number:
        print('right visa')
        return True, matched_valid_card_number.group(), credit_card_type
    else:
        print('wrong card number')
        invalid_card_number = False
        tested_card_number_validation = False
        return tested_card_number_validation, invalid_card_number, credit_card_type

def run_discover_card_validation(credit_card_number_value, credit_card_type):
    valid_card_number = re.compile('^6(?:011|5[0-9]{2})[0-9]{12}$')
    matched_valid_card_number = valid_card_number.match(credit_card_number_value)
    print(matched_valid_card_number)
    if matched_valid_card_number:
        print('right master')
        return True, matched_valid_card_number.group(), credit_card_type
    else:
        invalid_card_number = False
        tested_card_number_validation = False
        return tested_card_number_validation, invalid_card_number, credit_card_type


###########################################################################################

def main():

    credit_card_number_value, credit_card_type = credit_card_input()
    print(credit_card_number_value, credit_card_type, 'Main')
    credit_card_number, credit_card_type = check_credit_card_type(credit_card_number_value, credit_card_type)

    print(credit_card_number, credit_card_type, "nain none")
main()