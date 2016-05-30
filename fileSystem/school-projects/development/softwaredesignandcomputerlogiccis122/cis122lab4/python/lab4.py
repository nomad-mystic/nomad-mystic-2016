# programmer = Keith Murphy
# File = lab4.py
# Date Created = 2-22-2015
# Last Mod = 2-26-2015


# Hello Mark,
#             This is lab4, its modeled off of a website'\ns chart check-out. It asks pretty typical inputs for an
#             online shopping cart first name, last name, email, number, credit card type and number.
#             Valid Formats:
#             first name = string, one word no numbers no spaces
#             Last name = string, one word no numbers no spaces
#             email = string, need @ symbol can only be used once, can use dot more than once but need one
#             Phone number = string, this is the only format that works 555-555-5555
#             Credit card type = string, can be Mastercard, Visa, Discover capped or not
#             Credit card number =
#                         for Mastercard number = 'All MasterCard numbers start with the
#                                                  numbers 51 through 55. All have 16 digits.'
#                                                  # valid Mastercard 5165686598754525
#
#                         for Visa number = 'All Visa card numbers start with a 4. New cards
#                                            have 16 digits. Old cards have 13.'
#                                            # valid visa = 4366182844327555
#
#                         for Discover number = 'Discover card numbers begin with 6011 or 65. All have 16 digits.'
#                                                # valid discover 6011656459875421
#
#             Credit for Regular expressions and quotes above = 'http://www.regular-expressions.info/'
#
#             Two More Notes: One: I know two of the functions check_credit_card_type and credit_card_validation_loop
#                                  in my program could be combined in a Do...While loop but I built it mostly and
#                                  there was no turning back
#
#                             Two: There is one bug in my program I have noticed. If you type your name wrong on
#                                  the credit card name input the first time you try, it will through an error even
#                                  after you to through the loop correctly.
########################################################################################################################

# Inputs: name_input_value, email_input_value, number_input_value, credit_card_number
#         credit_card_type

# Outputs: valid_matched_first_name, valid_matched_last_name, valid_matched_email,  valid_matched_number,
#          credit_card_type, credit_card_number

# Variables:
#     Declare str valid
#     Declare str first_name_input_value
#     Declare str valid_matched_first_name
#     Declare str valid_first_name
#     Declare boolean tested_first_name_validation

#     Declare str last_name_input_value
#     Declare str valid_matched_last_name
#     Declare str valid_last_name
#     Declare Boolean tested_last_name_validation


#     Declare str email_input_value
#     Declare str valid_matched_email
#     Declare Boolean tested_email_validation
#     Declare str valid_email

#     Declare str number_input_value
#     Declare str valid_matched_number
#     Declare str valid_number
#     Declare Boolean tested_number_validation
#     Declare str credit_card_number
#     Declare str credit_card_type
#     Declare str valid_card_number
#     Declare str credit_card_number
#     Declare str matched_valid_card_number
#     Declare Boolean invalid_card_number
#     Declare Boolean tested_card_number_validation

# Import regular expressions external library
import re

# Module welcome_message()
#   Display Welcome Message
# End Module


def welcome_message():
    print('Welcome to you basic shopping cart checkout.')

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

###############################################################################

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

##################################################################################

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

###############################################################################

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

#############################################################################################

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

###########################################################################################

# Module str str str str str str str check_out_message(str valid_matched_first_name, str valid_matched_last_name,
#                                                      str valid_matched_email, str valid_matched_number,
#                                                      str credit_card_type, str credit_card_number)
#    Display Conformation Letter
#    Display This is the information we received for your cart:
#    Display Name: valid_matched_first_name, valid_matched_last_name
#    Display Email:  valid_matched_email
#    Display Phone Number:  valid_matched_number
#    Display Credit Card Type:  credit_card_type
#    Display credit_card_number
# End Module


def check_out_message(valid_matched_first_name, valid_matched_last_name, valid_matched_email,
                      valid_matched_number, credit_card_type, credit_card_number):
    print('Success! Conformation Letter!!')
    print('This is the information we received from your cart inputs:')
    print('Name:', valid_matched_first_name, valid_matched_last_name)
    print('Email:', valid_matched_email)
    print('Phone Number:', valid_matched_number)
    print('Credit Card Type:', credit_card_type)
    print(credit_card_number)


# Module main()
#
#     Declare str first_name_input_value
#     Declare str valid_matched_first_name
#     Declare str last_name_input_value
#     Declare str valid_matched_last_name
#     Declare str email_input_value
#     Declare str valid_matched_email
#     Declare str number_input_value
#     Declare str valid_matched_number
#     Declare str credit_card_number
#     Declare str credit_card_type
#
#     Call welcome_message()
#
#     Set first_name_input_value = first_name_input()
#     Set valid_matched_first_name = first_name_validation_loop(first_name_input_value)
#
#     Set last_name_input_value = last_name_input()
#     Set valid_matched_last_name = last_name_validation_loop(last_name_input_value)
#
#     Set email_input_value = email_input()
#     Set valid_matched_email = email_validation_loop(email_input_value)
#
#     Set number_input_value = number_input()
#     Set valid_matched_number = number_validation_loop(number_input_value)
#
#     Set credit_card_number, credit_card_type = credit_card_input()
#     Set credit_card_number, credit_card_type = check_credit_card_type(credit_card_number, credit_card_type)
#
#     Call check_out_message(valid_matched_first_name, valid_matched_last_name, valid_matched_email,
#                       valid_matched_number, credit_card_type, credit_card_number)
# End Module

# Call main()


def main():
    welcome_message()

    first_name_input_value = first_name_input()
    valid_matched_first_name = first_name_validation_loop(first_name_input_value)

    last_name_input_value = last_name_input()
    valid_matched_last_name = last_name_validation_loop(last_name_input_value)

    email_input_value = email_input()
    valid_matched_email = email_validation_loop(email_input_value)

    number_input_value = number_input()
    valid_matched_number = number_validation_loop(number_input_value)

    credit_card_number, credit_card_type = credit_card_input()
    credit_card_number, credit_card_type = check_credit_card_type(credit_card_number, credit_card_type)

    check_out_message(valid_matched_first_name, valid_matched_last_name, valid_matched_email,
                      valid_matched_number, credit_card_type, credit_card_number)

main()