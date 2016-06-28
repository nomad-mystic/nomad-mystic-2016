__author__ = 'pather'
# file = Lab2.py
# programmer = Keith Murphy
# date created = 1-15-2014
# last mod = 1-23-2014
#
# Hello Mark,
# This is the first stab at the lab2 assignment. I have everything
# working as I designed it in regrades to the calculations but I have noticed I'm getting a message
# stating 'inspection detects unconditional redecoration of names' not in something like this and it shows a def
# module, so I took the variables I was initialising at the top of the code section out. Functionality intact.
#
# input_list:
#               width_1, length_1, width_2, length_2
# output_list:
#               rectangle_1_area, rectangle_2_area, average_area_of_rectangles
#
#  Variables
# Declare real width_1
# Declare real length_1
# Declare real width_2
# Declare real  length_2
# Declare real rectangle_1_area
# Declare real rectangle_2_area
# Declare real average_area_of_rectangles
#
# Display 'Welcome Message'
#
# This is for the first rectangle:
# Display 'Please enter the width of you first rectangle:  '
# Input Real width_1
# Display 'Please enter the length of you first rectangle:  '
# Input Real length_1
#
# This is for the second rectangle:
# Display 'What is the width of you second rectangle '
# Input Real width_2
# Display 'What is the length of the second rectangle '
# Input Real length_2
#
# Set width_1
# Set length_1
# Set var rectangle_1_area = width_1 * length_1
# Set width_2
# Set length_2
# Set var rectangle_2_area = width_1 * length_1
# Set var average_area_of_rectangles = (rectangle_1_area + rectangle_2_area) / 2
#
# Display 'This is the area of your first rectangle = ', rectangle_1_area, 'and this is the area of your second
#          rectangle = ', 'Your area for the second rectangle is ', rectangle_2_area
# Display 'The average of the two rectangles is ', average_area_of_rectangles

# print("Welcome to your favorite two rectangle's areas and average finder.")

# Input from user to determine the area of the rectangles
# finding the area_1 of the first rectangle
# width_1 = float(input('Please enter the width of you first rectangle: '))
# length_1 = float(input('Please enter the length of the first rectangle: '))
# rectangle_1_area = width_1 * length_1

# Finding the area of the second circle
# width_2 = float(input('Please enter the width of you second rectangle: '))
# length_2 = float(input('Please enter the length of the second rectangle: '))
# rectangle_2_area = width_2 * length_2

# Calculate the area of the two rectangles
# average_area_of_rectangles = (rectangle_1_area + rectangle_2_area) / 2

# Displaying the output of the two areas and the average between them
# print(
#     'This is the area of your first rectangle =', str('{:.2f}'.format(rectangle_1_area)) +
#     ' and this is the area of your second rectangle =', str('{:.2f}'.format(rectangle_2_area)) + '.')

# print('The average between the two rectangles is', str('{:.3f}'.format(average_area_of_rectangles)) + '.')

import math

MAX_LIST_I = 2


class Circle:
    _radius = 0.0

    def set_radius(self, value):
        self._radius = value

    def get_radius(self):
        return self._radius

    def get_area(self):
        return math.pi * self._radius * self._radius


class Calulate:
    _circles = []

    def append(self, x):
        self._circles.append(x)

    def request_sizes(self):
        counter = 0
        total_area = 0
        while counter < len(self._circles):
            total_area = total_area + self._circles[counter].get_area()
            counter += 1
        return total_area / len(self._circles)


def input_init(prompt):
    done = False
    while not done:
        value = input(prompt)
        try:
            circle = int(value)
            done = True
        except:
            done = False
            print("You didn't enter a decimal number. Please try again")

    return circle


def main():
    calulate = Calulate()

    circle = Circle()
    r = input_init("Please enter the radius for circle 1 ")
    circle.set_radius(r)
    calulate.append(circle)

    circle = Circle()
    r = input_init("Please enter the radius for circle 2 ")
    circle.set_radius(r)
    calulate.append(circle)

    circle = Circle()
    r = input_init("Please enter the radius for circle 3 ")
    circle.set_radius(r)
    calulate.append(circle)

    average_area = calulate.request_sizes()
    print(average_area)

main()
