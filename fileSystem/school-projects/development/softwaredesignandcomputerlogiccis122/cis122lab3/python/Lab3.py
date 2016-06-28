# File = Lab3.py
# Programmer = Keith Murphy
# date created = 2-5-2015
# date Modified = 2-9-2015
__author__ = 'pather'

# Hello Mark,
#   This is my first a stab at the Lab3 assignment. Everything tested well logically ans tried to fallow pseudocode
#   specs closely. Let me know if I can make any improvements. Thanks

# Input = name_of_continent , years_in_the_future
# Output = name_of_continent, year_population_50, year_population_100

# Declare Variables:
# Declare Real years_in_the_future
# Declare String name_of_continent
# Declare Real year_population_50
# Declare Real year_population_100

# Module welcome_message()
#   Display String Welcome Message
# End module


def welcome_message():
    print('Welcome to the future continental population calculator!!')

# Module try_again()
#   Call main()
# End Module


def try_again():
    main()


# Function choose_continent()
#   Declare String name_of_continent
#   Declare Real years_in_the_future
#
#   Display string 'The six populated continents are...'
#   Display 'Please type the name of the continent...'
#   Input name_of_continent
#   Display String 'please type 50 or 100 years from now...'
#   Input years_in_the_future
#
#   If name of the continent matches a known Then
#       If years_in_the_future == 50.0 or years_in_the_future == 100.0 Then
#           Return name_of_continent, years_in_the_future
#       Else
#           Display 'Exit Message'
#           Call try_again()
#   Else
#       Display 'This is not a Continent I know About'
#       Call try_again()
#   End Else
# End Function


def choose_continent():
    print('The future population finder will find your chosen continents future population. '
          'The six populated continents are: Asia, Africa, Europe, South America, North America, or Oceania')

    name_of_continent = input(str('Please type the name of the continent you would like to know the future '
                                  'population of: '))
    years_in_the_future = float(input('Look into the future please type 50 or 100: '))

    if name_of_continent == 'Asia' or name_of_continent == 'asia' or name_of_continent == 'Africa' or \
            name_of_continent == 'africa' or name_of_continent == 'Europe' or name_of_continent == 'europe' or \
            name_of_continent == 'South America' or name_of_continent == 'south america' or \
            name_of_continent == 'North America' or name_of_continent == 'north america' or  \
            name_of_continent == 'Oceania' or name_of_continent == 'oceania':
        if years_in_the_future == 50.0 or years_in_the_future == 100.0:
            return name_of_continent, years_in_the_future
        else:
            print("That is not a year we looking at, Please try again")
            try_again()
    else:
        print("That is not the name of a continent I know , Please try again")
        try_again()

# Function string, real chosen_continent_pop_calculator(string name_of_continent, real years_in_the_future)
#   Declare Real year_population_50
#   Declare Real year_population_100
#
#   If name_of_continent == 'Asia' or name_of_continent == 'asia' Then
#       If years_in_the_future == 50.0 Then
#           Set current_population = Real 4298723288
#           Set current_rate_of_change = Real .0103 * 50
#           Set year_population_50 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#       Else Then
#           Set current_population = Real 4298723288
#           Set current_rate_of_change = Real .0103 * 100
#           Set year_population_100 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#   Else If  name_of_continent == 'Africa' or name_of_continent == 'africa' Then
#       If years_in_the_future == 50.0 Then
#           Set current_population = Real 1110635062
#           Set current_rate_of_change = Real .0245 * 50
#           Set year_population_50 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#       Else Then
#           Set current_population = Real1110635062
#           Set current_rate_of_change = Real .0245 * 100
#           Set year_population_100 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#   Else If  name_of_continent == 'Europe' or name_of_continent == 'europe' Then
#        If years_in_the_future == 50.0 Then
#           Set current_population = Real 742452170
#           Set current_rate_of_change = Real .0008 * 50
#           Set year_population_50 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#       Else Then
#           Set current_population = Real 742452170
#           Set current_rate_of_change = Real .0008 * 100
#           Set year_population_100 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#   Else If name_of_continent == 'South America' or name_of_continent == 'south america' Then
#        If years_in_the_future == 50.0 Then
#           Set current_population = Real 616644503
#           Set current_rate_of_change = Real .00111 * 50
#           Set year_population_50 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#       Else Then
#           Set current_population = Real 616644503
#           Set current_rate_of_change = Real .00111 * 100
#           Set year_population_100 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#   Else If name_of_continent == 'Oceania' or name_of_continent == 'oceania' Then
#        If years_in_the_future == 50.0 Then
#           Set current_population = Real 38303620
#           Set current_rate_of_change = Real .0142 * 50
#           Set year_population_50 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#       Else Then
#           Set current_population = Real 38303620
#           Set current_rate_of_change = Real .0142 * 100
#           Set year_population_100 = current_population * current_rate_of_change
#           Return name_of_continent, year_population_50, year_population_100
#   Else Then
#       Display 'Leaving Message'
#       Call try_again()
#
#   End If
# End Function


def chosen_continent_pop_calculator(name_of_continent, years_in_the_future):
    year_population_50 = float()
    year_population_100 = float()

    if name_of_continent == 'Asia' or name_of_continent == 'asia':
        if years_in_the_future == 50.0:
            current_population = float(4298723288)
            current_rate_of_change = float(.0103) * 50
            year_population_50 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
        else:
            current_population = float(4298723288)
            current_rate_of_change = float(.0103) * 100
            year_population_100 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
    elif name_of_continent == 'Africa' or name_of_continent == 'africa':
        if years_in_the_future == 50.0:
            current_population = float(1110635062)
            current_rate_of_change = float(.0245) * 50
            year_population_50 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
        else:
            current_population = float(1110635062)
            current_rate_of_change = float(.0245) * 100
            year_population_100 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
    elif name_of_continent == 'Europe' or name_of_continent == 'europe':
        if years_in_the_future == 50.0:
            current_population = float(742452170)
            current_rate_of_change = float(.0008) * 50
            year_population_50 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
        else:
            current_population = float(742452170)
            current_rate_of_change = float(.0008) * 100
            year_population_100 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100

    elif name_of_continent == 'South America' or name_of_continent == 'south america':
        if years_in_the_future == 50.0:
            current_population = float(616644503)
            current_rate_of_change = float(.00111) * 50
            year_population_50 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
        else:
            current_population = float(616644503)
            current_rate_of_change = float(.00111) * 100
            year_population_100 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100

    elif name_of_continent == 'North America' or name_of_continent == 'north america':
        if years_in_the_future == 50.0:
            current_population = float(355360791)
            current_rate_of_change = float(.0083) * 50
            year_population_50 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
        else:
            current_population = float(355360791)
            current_rate_of_change = float(.0083) * 100
            year_population_100 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
    elif name_of_continent == 'Oceania' or name_of_continent == 'oceania':
        if years_in_the_future == 50.0:
            current_population = float(38303620)
            current_rate_of_change = float(.0142) * 50
            year_population_50 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
        else:
            current_population = float(38303620)
            current_rate_of_change = float(.0142) * 100
            year_population_100 = current_population * current_rate_of_change
            return name_of_continent, year_population_50, year_population_100
    else:
        print('Some how you found the hidden lands of OZ, You Should leave Now!!')
        try_again()

# Function Str, Real, Real display_future_pop(Str name_of_continent, Real year_population_50, Real year_population_100)
#   If name_of_continent == 'Asia' or name_of_continent == 'asia' Then
#        If year_population_50 == 2213842493.32 Then
#             Display "This is the future spoken and say's to watch out because Asia is growing to "
#                   + year_population_50 + " people in 50 years time!!"
#        Else Then
#             Display "This is the future spoken and say's to watch out because Asia is growing to "
#                   + year_population_100 + " people in 100 years time!!"
#
#     Else If name_of_continent == 'Africa' or name_of_continent == 'africa' Then
#         If year_population_50 == 1360527950.95 Then
#             Display "This is the future spoken and say's to watch out because Africa is growing to "
#                   + year_population_50 + " people in 50 years time!!"
#         Else Then
#             Display "This is the future spoken and say's to watch out because Africa is growing to "
#                   + year_population_100 + " people in 100 years time!!"
#
#     Else If name_of_continent == 'Europe' or name_of_continent == 'europe' Then
#         If year_population_50 == 29698086.8 Then
#             Display "This is the future spoken and say's to watch out because Europe is growing to "
#                   + year_population_50 + " people in 50 years time!!"
#         Else Then
#             Display "This is the future spoken and say's to watch out because Europe is growing to "
#                   + year_population_100 + " people in 100 years time!!"
#
#     Else If name_of_continent == 'South America' or name_of_continent == 'south america' Then
#         If year_population_50 == 34223769.9165 Then
#             Display "This is the future spoken and say's to watch out because the South America is growing to "
#                   + year_population_50 + " people in 50 years time!!"
#         Else Then
#             Display "This is the future spoken and say's to watch out because South America is growing to "
#                   + year_population_100 + " people in 100 years time!!"
#     Else If name_of_continent == 'North America' or name_of_continent == 'north america' Then
#         If year_population_50 == 147474728.265 Then
#             Display "This is the future spoken and say's to watch out because the North America is growing to "
#                   + year_population_50 + " people in 50 years time!!"
#         Else Then
#             Display "This is the future spoken and say's to watch out because North America is growing to "
#                   + year_population_100 + " people in 100 years time!!"
#     Else If name_of_continent == 'Oceania' or name_of_continent == 'oceania' Then
#         If year_population_50 == 27195570.200000003 Then
#             Display "This is the future spoken and say's to watch out because the Oceania is growing to "
#                   + year_population_50 + " people in 50 years time!!"
#         Else Then
#             Display "This is the future spoken and say's to watch out because Oceania is growing to "
#                   + year_population_100 + " people in 100 years time!!"
#     Else Then
#         Call main()
#   End If
# End Function


def display_future_pop(name_of_continent, year_population_50, year_population_100):
    if name_of_continent == 'Asia' or name_of_continent == 'asia':
        if year_population_50 == 2213842493.32:
            print("This is the future spoken and say's to watch out because Asia is growing to "
                  + '{:.2f}'.format(year_population_50) + " people in 50 years time!!")
        else:
            print("This is the future spoken and say's to watch out because Asia is growing to "
                  + '{:.2f}'.format(year_population_100) + " people in 100 years time!!")

    elif name_of_continent == 'Africa' or name_of_continent == 'africa':
        if year_population_50 == 1360527950.95:
            print("This is the future spoken and say's to watch out because Africa is growing to "
                  + '{:.2f}'.format(year_population_50) + " people in 50 years time!!")
        else:
            print("This is the future spoken and say's to watch out because Africa is growing to "
                  + '{:.2f}'.format(year_population_100) + " people in 100 years time!!")

    elif name_of_continent == 'Europe' or name_of_continent == 'europe':
        if year_population_50 == 29698086.8:
            print("This is the future spoken and say's to watch out because Europe is growing to "
                  + '{:.2f}'.format(year_population_50) + " people in 50 years time!!")
        else:
            print("This is the future spoken and say's to watch out because Europe is growing to "
                  + '{:.2f}'.format(year_population_100) + " people in 100 years time!!")

    elif name_of_continent == 'South America' or name_of_continent == 'south america':
        if year_population_50 == 34223769.9165:
            print("This is the future spoken and say's to watch out because the South America is growing to "
                  + '{:.2f}'.format(year_population_50) + " people in 50 years time!!")
        else:
            print("This is the future spoken and say's to watch out because South America is growing to "
                  + '{:.2f}'.format(year_population_100) + " people in 100 years time!!")
    elif name_of_continent == 'North America' or name_of_continent == 'north america':
        if year_population_50 == 147474728.265:
            print("This is the future spoken and say's to watch out because the North America is growing to "
                  + '{:.2f}'.format(year_population_50) + " people in 50 years time!!")
        else:
            print("This is the future spoken and say's to watch out because North America is growing to "
                  + '{:.2f}'.format(year_population_100) + " people in 100 years time!!")
    elif name_of_continent == 'Oceania' or name_of_continent == 'oceania':
        if year_population_50 == 27195570.200000003:
            print("This is the future spoken and say's to watch out because the Oceania is growing to "
                  + '{:.2f}'.format(year_population_50) + " people in 50 years time!!")
        else:
            print("This is the future spoken and say's to watch out because Oceania is growing to "
                  + '{:.2f}'.format(year_population_100) + " people in 100 years time!!")
    else:
        main()


# Module main()
#   Call welcome_message()
#   Set name_of_continent, years_in_the_future = choose_continent()
#   Set name_of_continent, year_population_50, year_population_100 = \
#       chosen_continent_pop_calculator(name_of_continent, years_in_the_future)
#   Call display_future_pop(name_of_continent, year_population_50, year_population_100)
# End Module
# Call main()


def main():
    welcome_message()
    name_of_continent, years_in_the_future = choose_continent()
    name_of_continent, year_population_50, year_population_100 = \
        chosen_continent_pop_calculator(name_of_continent, years_in_the_future)
    display_future_pop(name_of_continent, year_population_50, year_population_100)
main()
