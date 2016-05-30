# programmer = Keith Murphy
# File = lab4_main_module.py
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
#                                  after you go through the loop correctly.
########################################################################################################################

# Inputs: name_input_value, email_input_value, number_input_value, credit_card_number
#         credit_card_type

# Outputs: valid_matched_first_name, valid_matched_last_name, valid_matched_email,  valid_matched_number,
#          credit_card_type, credit_card_number


# Import first_name functions
import first_name_functions

# Importing last_name functions
import last_name_functions

# Importing email Factions
import email_functions

# Import Phone Number Functions
import phone_number_functions

# Importing Credit card Functions
import credit_card_functions


# Module welcome_message()
#   Display Welcome Message
# End Module


def welcome_message():
    print('Welcome to you basic shopping cart checkout.')


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

    first_name_input_value = first_name_functions.first_name_input()
    valid_matched_first_name = first_name_functions.first_name_validation_loop(first_name_input_value)

    last_name_input_value = last_name_functions.last_name_input()
    valid_matched_last_name = last_name_functions.last_name_validation_loop(last_name_input_value)

    email_input_value = email_functions.email_input()
    valid_matched_email = email_functions.email_validation_loop(email_input_value)

    number_input_value = phone_number_functions.number_input()
    valid_matched_number = phone_number_functions.number_validation_loop(number_input_value)

    credit_card_number, credit_card_type = credit_card_functions.credit_card_input()
    credit_card_number, credit_card_type = credit_card_functions.check_credit_card_type(credit_card_number,
                                                                                        credit_card_type)

    check_out_message(valid_matched_first_name, valid_matched_last_name, valid_matched_email,
                      valid_matched_number, credit_card_type, credit_card_number)

main()