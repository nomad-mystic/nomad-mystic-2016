# programmer = Keith Murphy
# File = credit_card_functions.py
# Date Created = 2-26-2015
# Last Mod = 2-26-2015

# Import regular expressions external library
import re


#     Declare str credit_card_number
#     Declare str credit_card_type
#     Declare str valid_card_number
#     Declare str credit_card_number
#     Declare str matched_valid_card_number
#     Declare Boolean invalid_card_number
#     Declare Boolean tested_card_number_validation

# Function credit_card_input()
#   Declare str credit_card_type
#   Declare str credit_card_number
#
#   Display Please enter your credit card type (Examples: Mastercard, Visa, Discover):
#   Input credit_card_type
#   Display Please enter your credit card number(No Spaces):
#   Input credit_card_number
#
#   Return credit_card_number, credit_card_type
# End Function


def credit_card_input():
    credit_card_type = input('Please enter your credit card type (Examples: Mastercard, Visa, Discover): ')
    credit_card_number = input('Please enter your credit card number(No Spaces): ')

    return credit_card_number, credit_card_type
# Function str str check_credit_card_type(str credit_card_number, str credit_card_type)
#     Declare str credit_card_type
#     Declare str credit_card_number
#     Declare Boolean  tested_card_number_validation
#
#     If credit_card_type == 'Mastercard' or credit_card_type == 'mastercard' Then
#         Set tested_card_number_validation, credit_card_number, credit_card_type = \
#             run_master_card_validation(credit_card_number, credit_card_type)
#
#         Set credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
#                                                                            credit_card_number,
#                                                                            credit_card_type)
#         Return credit_card_number, credit_card_type
#
#     Else If  credit_card_type == 'Visa' or credit_card_type == 'visa' Then
#         Set tested_card_number_validation, credit_card_number, credit_card_type = \
#             run_visa_card_validation(credit_card_number, credit_card_type)
#
#         Set credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
#                                                                            credit_card_number,
#                                                                            credit_card_type)
#         Return credit_card_number, credit_card_type
#
#     Else If credit_card_type == 'Discover' or credit_card_type == 'discover' Then
#         Set tested_card_number_validation, credit_card_number, credit_card_type = \
#             run_discover_card_validation(credit_card_number, credit_card_type)
#
#         Set credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
#                                                                            credit_card_number,
#                                                                            credit_card_type)
#         Return credit_card_number, credit_card_type
#     Else
#         Display Sorry I didn't understand what you entered, Please try Again
#         Call credit_card_input()
#     End If
# End Function


def check_credit_card_type(credit_card_number, credit_card_type):
    if credit_card_type == 'Mastercard' or credit_card_type == 'mastercard':
        tested_card_number_validation, credit_card_number, credit_card_type = \
            run_master_card_validation(credit_card_number, credit_card_type)

        credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
                                                                           credit_card_number,
                                                                           credit_card_type)
        return credit_card_number, credit_card_type

    elif credit_card_type == 'Visa' or credit_card_type == 'visa':
        tested_card_number_validation, credit_card_number, credit_card_type = \
            run_visa_card_validation(credit_card_number, credit_card_type)

        credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
                                                                           credit_card_number,
                                                                           credit_card_type)
        return credit_card_number, credit_card_type

    elif credit_card_type == 'Discover' or credit_card_type == 'discover':
        tested_card_number_validation, credit_card_number, credit_card_type = \
            run_discover_card_validation(credit_card_number, credit_card_type)

        credit_card_number, credit_card_type = credit_card_validation_loop(tested_card_number_validation,
                                                                           credit_card_number,
                                                                           credit_card_type)
        return credit_card_number, credit_card_type
    else:
        print("Sorry I didn't understand what you entered, Please try Again")
        credit_card_input()

# Function Boolean str str credit_card_validation_loop(Boolean tested_card_number_validation,
#                                                      str credit_card_number, str credit_card_type)
#    Declare str credit_card_number
#    Declare Boolean tested_card_number_validation
#    Declare str credit_card_type
#    While not tested_card_number_validation
#
#         Set credit_card_number, credit_card_type = credit_card_input()
#
#         If credit_card_type == 'Mastercard' or credit_card_type == 'mastercard' Then
#             Set tested_card_number_validation, credit_card_number, credit_card_type = \
#                 run_master_card_validation(credit_card_number, credit_card_type)
#
#         Else If credit_card_type == 'Visa' or credit_card_type == 'visa' Then
#             Set tested_card_number_validation, credit_card_number, credit_card_type = \
#                 run_visa_card_validation(credit_card_number, credit_card_type)
#
#         Else If credit_card_type == 'Discover' or credit_card_type == 'discover' Then
#             Set tested_card_number_validation, credit_card_number, credit_card_type = \
#                 run_discover_card_validation(credit_card_number, credit_card_type)
#         End If
#     End While
#     Set credit_card_number = 'Your card was approved. Thank You for shopping with us here at NomadMystics.com '
#     Return credit_card_number, credit_card_type
# End Function


def credit_card_validation_loop(tested_card_number_validation, credit_card_number, credit_card_type):
    while not tested_card_number_validation:

        credit_card_number, credit_card_type = credit_card_input()

        if credit_card_type == 'Mastercard' or credit_card_type == 'mastercard':
            tested_card_number_validation, credit_card_number, credit_card_type = \
                run_master_card_validation(credit_card_number, credit_card_type)

        elif credit_card_type == 'Visa' or credit_card_type == 'visa':
            tested_card_number_validation, credit_card_number, credit_card_type = \
                run_visa_card_validation(credit_card_number, credit_card_type)

        elif credit_card_type == 'Discover' or credit_card_type == 'discover':
            tested_card_number_validation, credit_card_number, credit_card_type = \
                run_discover_card_validation(credit_card_number, credit_card_type)
    credit_card_number = 'Your card was approved. Thank You for shopping with us here at NomadMystics.com '
    return credit_card_number, credit_card_type

# Function str str run_master_card_validation(str credit_card_number, str credit_card_type)
#     Declare str valid_card_number
#     Declare str credit_card_number
#     Declare str matched_valid_card_number
#     Declare Boolean invalid_card_number
#     Declare Boolean tested_card_number_validation
#
#     valid_card_number = re.compile('^5[1-5][0-9]{14}$')
#     matched_valid_card_number = valid_card_number.match(credit_card_number)
#
#     If matched_valid_card_number Then
#
#         Return True, matched_valid_card_number.group(), credit_card_type
#     Else
#         Set invalid_card_number = False
#         Set tested_card_number_validation = False
#
#         Return tested_card_number_validation, invalid_card_number, credit_card_type
#     End If
# End Function


def run_master_card_validation(credit_card_number, credit_card_type):
    valid_card_number = re.compile('^5[1-5][0-9]{14}$')
    matched_valid_card_number = valid_card_number.match(credit_card_number)

    if matched_valid_card_number:

        return True, matched_valid_card_number.group(), credit_card_type
    else:
        invalid_card_number = False
        tested_card_number_validation = False

        return tested_card_number_validation, invalid_card_number, credit_card_type


# Function str str run_visa_card_validation(str credit_card_number, str credit_card_type)
#     Declare str valid_card_number
#     Declare str credit_card_number
#     Declare str matched_valid_card_number
#     Declare Boolean invalid_card_number
#     Declare Boolean tested_card_number_validation
#
#     valid_card_number = re.compile('^4[0-9]{12}(?:[0-9]{3})?$')
#     matched_valid_card_number = valid_card_number.match(credit_card_number)
#
#     If matched_valid_card_number Then
#
#         Return True, matched_valid_card_number.group(), credit_card_type
#     Else
#         Set invalid_card_number = False
#         Set tested_card_number_validation = False
#
#         Return tested_card_number_validation, invalid_card_number, credit_card_type
#     End If
# End Function

def run_visa_card_validation(credit_card_number, credit_card_type):
    valid_card_number = re.compile('^4[0-9]{12}(?:[0-9]{3})?$')
    matched_valid_card_number = valid_card_number.match(credit_card_number)

    if matched_valid_card_number:

        return True, matched_valid_card_number.group(), credit_card_type
    else:
        invalid_card_number = False
        tested_card_number_validation = False

        return tested_card_number_validation, invalid_card_number, credit_card_type


# Function str str run_discover_card_validation(str credit_card_number, str credit_card_type)
#     Declare str valid_card_number
#     Declare str credit_card_number
#     Declare str matched_valid_card_number
#     Declare Boolean invalid_card_number
#     Declare Boolean tested_card_number_validation
#
#     valid_card_number = re.compile('^6(?:011|5[0-9]{2})[0-9]{12}$')
#     matched_valid_card_number = valid_card_number.match(credit_card_number)
#
#     If matched_valid_card_number Then
#
#         Return True, matched_valid_card_number.group(), credit_card_type
#     Else
#         Set invalid_card_number = False
#         Set tested_card_number_validation = False
#
#         Return tested_card_number_validation, invalid_card_number, credit_card_type
#     End If
# End Function

def run_discover_card_validation(credit_card_number, credit_card_type):
    valid_card_number = re.compile('^6(?:011|5[0-9]{2})[0-9]{12}$')
    matched_valid_card_number = valid_card_number.match(credit_card_number)

    if matched_valid_card_number:

        return True, matched_valid_card_number.group(), credit_card_type
    else:
        invalid_card_number = False
        tested_card_number_validation = False

        return tested_card_number_validation, invalid_card_number, credit_card_type



