# programmer = Keith Murphy
# File = last_name_functions.py
# Date Created = 2-26-2015
# Last Mod = 2-26-2015

# Import regular expressions external library
import re

#     Declare str last_name_input_value
#     Declare str valid_matched_last_name
#     Declare str valid_last_name
#     Declare Boolean tested_last_name_validation


# Function last_name_input
#   Declare name_input_value
#   Display Please Type your last name:
#   Input name_input_value
#   Return name_input_value
# End Function


def last_name_input():
    name_input_value = str(input('Please Type your last name: '))

    return name_input_value


# Function str run_last_name_validation(str last_name_input_value)
#    Declare str valid
#    Declare str valid_last_name
#    Declare boolean tested_last_name_validation
#
#    Set valid = re.compile('^[a-zA-Z]+$')
#    Set valid_last_name = valid.match(last_name_input_value)
#
#    If valid_last_name Then
#      Return True, valid_last_name.group()
#    Else:
#      Set tested_last_name_validation = False
#      Return tested_last_name_validation, False
#    End If
# End Function


def run_last_name_validation(last_name_input_value):
    valid = re.compile('^[a-zA-Z]+$')
    valid_last_name = valid.match(last_name_input_value)

    if valid_last_name:

        return True, valid_last_name.group()
    else:
        tested_last_name_validation = False

        return tested_last_name_validation, False

# Function str last_name_validation_loop(str last_name_input_value)
#   Declare Boolean valid_matched_last_name
#   Declare Boolean tested_last_name_validation
#   Declare str last_name_input_value
#
#   Set tested_last_name_validation, valid_matched_last_name = run_last_name_validation(last_name_input_value)
#   While Not tested_last_name_validation
#     Set last_name_input_value = last_name_input()
#     Set tested_last_name_validation, valid_matched_last_name = run_last_name_validation(last_name_input_value)
#   End While
#
#   Return valid_matched_last_name
# End Function


def last_name_validation_loop(last_name_input_value):
    tested_last_name_validation, valid_matched_last_name = run_last_name_validation(last_name_input_value)

    while not tested_last_name_validation:
        last_name_input_value = last_name_input()
        tested_last_name_validation, valid_matched_last_name = run_last_name_validation(last_name_input_value)

    return valid_matched_last_name