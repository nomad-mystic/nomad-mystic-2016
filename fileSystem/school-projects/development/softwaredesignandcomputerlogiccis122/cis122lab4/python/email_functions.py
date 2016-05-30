# programmer = Keith Murphy
# File = email_functions.py
# Date Created = 2-26-2015
# Last Mod = 2-26-2015

# Import regular expressions external library
import re

#     Declare str email_input_value
#     Declare str valid_matched_email
#     Declare Boolean tested_email_validation
#     Declare str valid_email

# Function email_input()
#     Declare str email_input_value
#
#     Display Please enter you email address (Examples: your_email@domain.*):
#     Input email_input_value
#
#     Return email_input_value
# End Function


def email_input():
    email_input_value = input('Please enter you email address (Examples: your_email@domain.*): ')

    return email_input_value

# Function str run_email_validation(str email_input_value)
#     Declare str valid_email
#     Declare str matched_valid_email
#     Declare boolean tested_email_validation
#
#     Set valid_email = re.compile('[^@]+@[^@]+\.[^@]+')
#     Set matched_valid_email = valid_email.match(email_input_value)
#
#     If matched_valid_email Then
#
#         Return True, matched_valid_email.group()
#     Else:
#         Set tested_email_validation = False
#     End If
#         Return tested_email_validation, False
# End Function


def run_email_validation(email_input_value):
    valid_email = re.compile('[^@]+@[^@]+\.[^@]+')
    matched_valid_email = valid_email.match(email_input_value)

    if matched_valid_email:

        return True, matched_valid_email.group()
    else:
        tested_email_validation = False

        return tested_email_validation, False

# Function str email_validation_loop(str email_input_value)
#    Declare Boolean tested_email_validation
#    Declare str valid_matched_email
#
#    Set tested_email_validation, valid_matched_email = run_email_validation(email_input_value)
#
#    While Not tested_email_validation
#        Set email_input_value = email_input()
#        Set tested_email_validation, valid_matched_email = run_email_validation(email_input_value)
#
#    Return valid_matched_email
# End Function


def email_validation_loop(email_input_value):
    tested_email_validation, valid_matched_email = run_email_validation(email_input_value)

    while not tested_email_validation:
        email_input_value = email_input()
        tested_email_validation, valid_matched_email = run_email_validation(email_input_value)

    return valid_matched_email