__author__ = 'pather'

# Programmer = Keith Murphy
# File = lab5.py
# Date Created 3-5-2015
# Last Mod = 3-10-2015

#   Hello Mark, This is Lab 5 take #2 which is way less ambitious as the last. :) Thanks for the extra point on the last
#               Lab I appreciate that. I worked many a hour to complete that Lab. It was a great learning experience
#               because form validation is a big part of working as a front-end JavaScript developer and I will need
#               to know how it works. Anyways, This lab is a simple appointment tracker. Enter a task and the time
#               it's at and the program will print you a list.

# Inputs: input_tasks, input_times
# Outputs: list_tasks[i], time_of_tasks[i]

# Variables
#   Declare Boolean finish
#   Declare Boolean valid_time
#   Declare Boolean valid_task
#   Declare Integer i
#   Declare Integer valid_task_counter
#   Declare Integer valid_time_counter
#   Declare Integer entered_time
#   Declare Boolean yes_or_no
#   Declare String entered_task
#   Declare Integer number_of_tasks
#   Declare Integer constant MAX_LIST_I
#   Declare String list_tasks[MAX_LIST_I]
#   Declare Integer time_of_tasks[MAX_LIST_I]

#   Declare Integer constant MAX_LIST_I
MAX_LIST_I = 30

# Module welcome_message()
#   Display 'This program will help you keep your appointments. Just type in the task and time. The program will print
#    you a copy.'
# End Module


def welcome_message():
    print('This program will help you keep your appointments. Just type in the task and time. The program will print '
          'you a copy.')

# Function Integer find_what_to_do(String list_tasks[], Integer time_of_tasks[])
#   Declare Boolean finish
#   Declare Boolean valid_time
#   Declare Boolean valid_task
#   Declare Integer i
#   Declare Integer valid_task_counter
#   Declare Integer valid_time_counter
#   While Not finish
#       Set valid_task, list_tasks[i] = input_tasks(str('Please enter your task: '))
#       While Not valid_task
#           Set valid_task, list_tasks[i] = input_tasks(str('Please enter your task: '))
#           Set valid_task_counter = valid_task_counter + 1
#       End While
#       Set valid_time, time_of_tasks[i] = input_times(' Please enter the time: ')
#       While
#           Set valid_time, time_of_tasks[i] = input_times(Please enter the time: ')
#           Set valid_time_counter = valid_time_counter + 1
#       End While
#       Set i = i + 1
#       Set finish = continue_list_input()
#   End While
#   Return i - 1
# End Function


def find_what_to_do(list_tasks, time_of_tasks):
    finish = False
    i = 0
    valid_task_counter = 0
    valid_time_counter = 0
    while not finish:
        valid_task, list_tasks[i] = input_tasks(str('Please enter your task: '))

        while not valid_task:

            valid_task, list_tasks[i] = input_tasks(str('Please enter your task: '))
            valid_task_counter += 1

        valid_time, time_of_tasks[i] = input_times('Please enter the time of you task(Example: 130): ')
        while not valid_time:

            valid_time, time_of_tasks[i] = input_times('Please enter the time of you task(Example: 130): ')
            valid_time_counter += 0

        i += 1
        finish = continue_list_input()
    return i - 1

# Function Boolean String Integer input_times(Integer entered_time)
#   Declare Integer entered_time
#
#   Set entered_time = input(entered_time)
#   Try
#       Set entered_time = int(entered_time)
#       Return True, entered_time
#   Except
#       Return False, ''
# End Function


def input_times(entered_time):
    entered_time = input(entered_time)
    try:
        entered_time = int(entered_time)
        return True, entered_time
    except:
        return False, ''

# Function Boolean String input_tasks(String entered_task)
#   Declare String entered_task
#
#   Input entered_task
#   Set entered_task_len = len(entered_task)
#
#   If entered_task_len < 35 Then
#       Return True, entered_task
#   Else
#       Return False, ''
#   End If
# End Function


def input_tasks(entered_task):
    entered_task = input(entered_task)
    entered_task_len = len(entered_task)
    if entered_task_len < 35:

        return True, entered_task
    else:
        return False, ''

# Function continue_list_input()
#   Declare Boolean yes_or_no
#
#   Set yes_or_no = input('Would you like to add another item to your list Y/N')
#
#   If yes_or_no == 'y' || yes_or_no == 'Y' Then
#       Return False
#   Else If yes_or_no == 'N' || yes_or_no == 'n' Then
#       Return True
#   Else
#       Call continue_list_input()
#   End If
# End Function


def continue_list_input():
    yes_or_no = input('Would you like to add another item to your list Y/N')
    if yes_or_no == 'Y' or yes_or_no == 'y':
        return False
    elif yes_or_no == 'N' or yes_or_no == 'n':
        return True
    else:
        continue_list_input()

# Module compile_list(Integer number_of_tasks, String list_tasks[], Integer time_of_tasks[])
#   Declare Integer i = 0
#
#   Display 'This is the list of appointments for you today and the times there are at: '
#
#   While i <= number_of_tasks
#       Display list_tasks[i] at time_of_tasks[i]
#       Set i = i + 1
#   End While
# End Module


def compile_list(number_of_tasks, list_tasks, time_of_tasks):
    i = 0
    print('This is the list of appointments for you today and the times there are at: ')
    while i <= number_of_tasks:
        print(list_tasks[i], 'at', time_of_tasks[i])
        i += 1

# Module main()
#   Declare Integer number_of_tasks
#   Declare str list_tasks[MAX_LIST_I]
#   Declare Integer time_of_tasks[MAX_LIST_I]
#
#   Call welcome_message()
#   Set number_of_tasks = find_what_to_do(str list_tasks[], int time_of_tasks[])
#   Call compile_list(Integer number_of_tasks, String list_tasks[], String time_of_tasks[])
# End Module
# Call main()


def main():
    list_tasks = ['' for x in range(MAX_LIST_I)]
    time_of_tasks = [0 for x in range(MAX_LIST_I)]

    welcome_message()
    number_of_tasks = find_what_to_do(list_tasks, time_of_tasks)
    compile_list(number_of_tasks, list_tasks, time_of_tasks)
main()
