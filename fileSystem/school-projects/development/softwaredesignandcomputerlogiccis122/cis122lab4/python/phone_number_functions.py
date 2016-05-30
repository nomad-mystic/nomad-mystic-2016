# programmer = Keith Murphy
# File = phone_number_functions.py
# Date Created = 2-26-2015
# Last Mod = 2-26-2015

# Import regular expressions external library
import re

#     Declare str number_input_value
#     Declare str valid_matched_number
#     Declare str valid_number
#     Declare Boolean tested_number_validation

# Function number_input()
#     Declare str number_input_value
#
#     Display Please enter you phone number (Examples: 555-555-5555):
#     Input number_input_value
#
#     Return number_input_value
# End Function


def number_input():
    number_input_value = input('Please enter you phone number (Examples: 555-555-5555): ')
    return number_input_value


# Function str run_number_validation(number_input_value)
#     Declare str valid_number
#     Declare str matched_valid_number
#     Declare Boolean tested_number_validation
#
#     Set valid_number = re.compile("^(\d{3})-(\d{3})-(\d{4})$")
#     Set matched_valid_number = valid_number.match(number_input_value)
#
#     If matched_valid_number Then
#
#         Return True, matched_valid_number.group()
#     Else
#         tested_number_validation = False
#         return tested_number_validation, False
#     End If
# End Function

def run_number_validation(number_input_value):
    valid_number = re.compile("^(\d{3})-(\d{3})-(\d{4})$")
    matched_valid_number = valid_number.match(number_input_value)

    if matched_valid_number:

        return True, matched_valid_number.group()
    else:
        tested_number_validation = False

        return tested_number_validation, False

# Function str number_validation_loop(str number_input_value)
#     Declare Boolean tested_number_validation
#     Declare str valid_matched_number
#     Declare str number_input_value
#
#     Set tested_number_validation, valid_matched_number = run_number_validation(number_input_value)
#
#     While not tested_number_validation:
#         Set number_input_value = number_input()
#         Set tested_number_validation, valid_matched_number = run_number_validation(number_input_value)
#     End While
#
#     Return valid_matched_number
# End Function


def number_validation_loop(number_input_value):
    tested_number_validation, valid_matched_number = run_number_validation(number_input_value)
    while not tested_number_validation:
        number_input_value = number_input()
        tested_number_validation, valid_matched_number = run_number_validation(number_input_value)

    return valid_matched_number