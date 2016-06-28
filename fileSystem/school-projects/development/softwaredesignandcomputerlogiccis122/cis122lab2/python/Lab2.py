# file = Lab2.py
# programmer = Keith Murphy
# date created = 1-15-2014
# last mod = 1-25-2014
#
# input_list:
#               width_1, length_1, width_2, length_2
# output_list:
#               rectangle_1_area, rectangle_2_area, average_area_of_rectangles
#
#     Variables
# Declare real width_1
# Declare real length_1
# Declare real width_2
# Declare real length_2
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
# Set rectangle_1_area = width_1 * length_1
# Set rectangle_2_area = width_2 * length_2
# Set average_area_of_rectangles = (rectangle_1_area + rectangle_2_area) / 2
#
# Display 'This is the area of your first rectangle = ', rectangle_1_area, 'and this is the area of your second
#          rectangle = ', 'Your area for the second rectangle is ', rectangle_2_area
# Display 'The average of the two rectangles is ', average_area_of_rectangles

print("Welcome to your favorite two rectangle's areas and average finder.")

# Input from user to determine the area of the rectangles
# finding the area_1 of the first rectangle
width_1 = float(input('Please enter the width of you first rectangle: '))
length_1 = float(input('Please enter the length of the first rectangle: '))

# Finding the area of the second circle
width_2 = float(input('Please enter the width of you second rectangle: '))
length_2 = float(input('Please enter the length of the second rectangle: '))

# Calculate the area of the two rectangles individually and together
rectangle_1_area = width_1 * length_1
rectangle_2_area = width_2 * length_2
average_area_of_rectangles = (rectangle_1_area + rectangle_2_area) / 2

# Displaying the output of the two areas and the average between them
print(
    'This is the area of your first rectangle =', str('{:.2f}'.format(rectangle_1_area)) +
    ' and this is the area of your second rectangle =', str('{:.2f}'.format(rectangle_2_area)) + '.')

print('The average between the two rectangles is', str('{:.3f}'.format(average_area_of_rectangles)) + '.')

