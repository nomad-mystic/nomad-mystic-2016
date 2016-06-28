
# file = Lab6.py
# programmer = Keith Murphy
# date created = 3-17-2014
# last mod = 1-18-2014
#
#   Importing Math External Library
import math

# Inputs: input_init
# Outputs: average_area


# Class Circle
#   Declare Real _radius
#   Declare String value
#
#   Public Module set_radius(String value)
#       Set _radius = value
#   End Module
#
#   Public Function def get_radius():
#       Return _radius
#   End Function
#
#   Public Function def get_area():
#       Return math.pi * _radius * _radius
#   End Function
# End Class


class Circle:
    _radius = 0.0

    def set_radius(self, value):
        self._radius = value

    def get_radius(self):
        return self._radius

    def get_area(self):
        return math.pi * self._radius * self._radius


# Class Calculate
#   Declare Real _circles[]
#   Declare Integer counter
#   Declare Real total_area
#
#   Public Module append(Real x)
#       Set self._circles.append(x)
#   End Module
#
#   Public Real Function request_sizes()
#        Set counter = 0
#        Set total_area = 0
#        While counter < len(self._circles)
#           Set total_area = total_area + self._circles[counter].get_area()
#           Set counter += 1
#        End While
#        Return total_area / len(self._circles)
#   End Function
# End Class


class Calculate:
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

# Function Real input_init(String prompt)
#   Declare Boolean done = False
#   Declare String value
#   Declare Real r
#
#   While Not Done
#       Set value = input(prompt)
#       Try
#           Set r = Float(value)
#           Set done = True
#       Except
#           Set done = False
#           Display "You didn't enter a Real number. Please try again"
#   End While
#   Return r
# End Function


def input_init(prompt):
    done = False
    while not done:
        value = input(prompt)
        try:
            r = float(value)
            done = True
        except:
            done = False
            print("You didn't enter a Real number. Please try again")

    return r

# Module main()
#
#   Set circle = New Calculate
#   Set radius1 = input_init('Please enter the radius for circle 1: ')
#   Set circle.set_radius(radius1)
#   Set calculate.append(circle)
#
#   Set circle = Circle()
#   Set radius2 = input_init('Please enter the radius for circle 2: ')
#   Set circle.set_radius(radius2)
#   Set calculate.append(circle)
#
#   Set average_area = calculate.request_sizes()
#   Display average_area
# End Module


def main():
    calculate = Calculate()

    circle = Circle()
    r = input_init('Please enter the radius for circle 1: ')
    circle.set_radius(r)
    calculate.append(circle)

    circle = Circle()
    r = input_init('Please enter the radius for circle 2: ')
    circle.set_radius(r)
    calculate.append(circle)

    average_area = calculate.request_sizes()
    print(average_area)

main()
