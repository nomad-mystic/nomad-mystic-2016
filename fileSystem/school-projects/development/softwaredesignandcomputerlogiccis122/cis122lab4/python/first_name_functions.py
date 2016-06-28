# programmer = Keith Murphy
# File = first_name_functions.py
# Date Created = 2-26-2015
# Last Mod = 2-26-2015

# Import regular expressions external library
import re

#     Declare str first_name_input_value
#     Declare str valid_matched_first_name
#     Declare str valid_first_name
#     Declare boolean tested_first_name_validation

# Function first_name_input():
#   Declare str name_input_value
#
#   Display Please Type your first name:
#   Input name_input_value
#   Return name_input_value
# End Function


def first_name_input():
    name_input_value = str(input('Please Type your first name: '))

    return name_input_value


# Function str first_name_validation_loop( str first_name_input_value)
#   Declare str Boolean valid_matched_first_name
#   Declare  Boolean tested_first_name_validation
#   Declare str first_name_input_value
#
#   Set tested_first_name_validation, valid_matched_first_name = run_first_name_validation(first_name_input_value)
#
#   While Not tested_first_name_validation
#     Set first_name_input_value = first_name_input()
#     Set tested_first_name_validation, valid_matched_first_name = run_first_name_validation(first_name_input_value)
#   End While
#
#   Return valid_matched_first_name
# End Function

def first_name_validation_loop(first_name_input_value):
    tested_first_name_validation, valid_matched_first_name = run_first_name_validation(first_name_input_value)

    while not tested_first_name_validation:
        first_name_input_value = first_name_input()
        tested_first_name_validation, valid_matched_first_name = run_first_name_validation(first_name_input_value)

    return valid_matched_first_name

# Function str run_first_name_validation(str first_name_input_value)
#   Declare str valid
#   Declare str valid_first_name
#   Declare boolean tested_first_name_validation
#
#   Set valid = re.compile('^[a-zA-Z]+$')
#   Set valid_first_name = valid.match(first_name_input_value)
#
#   If valid_first_name Then
#      Return True, valid_first_name.group()
#   Else
#      Set tested_first_name_validation = False
#      Return tested_first_name_validation, False
#   End If
# End Function


def run_first_name_validation(first_name_input_value):
    valid = re.compile('^[a-zA-Z]+$')
    valid_first_name = valid.match(first_name_input_value)

    if valid_first_name:

        return True, valid_first_name.group()
    else:
        tested_first_name_validation = False

        return tested_first_name_validation, False