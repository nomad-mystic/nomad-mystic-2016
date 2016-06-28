__author__ = 'TEB215'

# Input List: volts, resistance
# Output List: volts, resistance, watts, amps

# Function Real, Real input_values()
#   Declare Real volts
#   Declare Real resistance
#
#   Display "Please enter volts:"
#   Input volts
#   Display "Please enter resistance:"
#   Input resistance
#   Return volts, resistance
# End Function

def input_values():
    volts = 0.0
    resistance = 0.0
    amps_or_watts = ""

    volts = float(input("Please enter the voltage: "))
    resistance = float(input("Please enter the resistance: "))
    amps_or_watts = input("Do you want to calculate amps or watts? (A/W): ")
    return volts, resistance, amps_or_watts

# Function Real calculate_amps(Real volts, Real resistance)
#   Declare Real amps
#
#   Set amps = volts / resistance
#   Return amps
# End Function


def calculate_amps(volts, resistance):
    amps = 0.0

    amps = volts / resistance
    return amps

# Function Real calculate_watts(Real amps, Real volts)
#   Declare Real watts
#
#   Set watts = amps * volts
#   Return watts
# End Function


def calculate_watts(amps, volts):
    watts = amps * volts
    return watts

# Module output_values(Real volts, Real resistance, Real watts, Real amps)
#   Display "You entered", volts, "volts"
#   Display "and", resistance, "ohms."
#   Display "This results in", watts, "Watts"
#   Display "and", amps, "amps."
# End Module


def output_amps(volts, resistance, amps):
    print("You entered", volts, "volts")
    print("and", resistance, "ohms.")
    print("This results in", "{:.2f}".format(amps), "amps.")


def output_watts(volts, resistance, watts):
    print("You entered", volts, "volts")
    print("and", resistance, "ohms.")
    print("This results in", "{:.2f}".format(watts), "watts.")

# Module display_welcome()
#   Display welcome message
# End Module

def display_welcome():
    print("Wecome to the Ohm's Law calculator!")

def output_selection_error(amps_or_watts):
    print("Whoops! You should type 'A' or 'W' for Amps or Watts!")
    print("You typed:", amps_or_watts)

# Module ohms_law()
#   Declare Real volts
#   Declare Real amps
#   Declare Real watts
#   Declare Real resistance
#
#   Call display_welcome()
#   Set volts, resistance = input_values()
#   Set amps = calculate_amps(volts, resistance)
#   Set watts = calculate_watts(amps, volts)
#   Call output_values(volts, resistance, watts, amps)
# End Module


def output_resistance_error(resistance):
    print("Whoops! Resistance must be positive!")
    print("You entered: ", resistance)


def ohms_law():
    volts = 0.0
    amps = 0.0
    resistance = 0.0
    watts = 0.0
    amps_or_watts_selection = ""

    display_welcome()
    volts, resistance, amps_or_watts_selection = input_values()
    if resistance > 0:
        if amps_or_watts_selection == "A" or amps_or_watts_selection == "a":
            amps = calculate_amps(volts, resistance)
            output_amps(volts, resistance, amps)
        elif amps_or_watts_selection == "W" or amps_or_watts_selection == "w":
            amps = calculate_amps(volts, resistance)
            watts = calculate_watts(amps, volts)
            output_watts(volts, resistance, watts)
        else:
            output_selection_error(amps_or_watts_selection)
            ohms_law()
    else:
        output_resistance_error(resistance)
ohms_law()
