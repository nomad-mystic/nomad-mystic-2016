__author__ = 'pather'

import urllib.request
import re

africa_url_response = urllib.request.urlopen('http://worldpopulationreview.com/continents/africa-population/')
africa_url_html = africa_url_response.read()
africa_url_text = africa_url_html.decode('UTF-8')
africa_current_population = re.search('<span>([^<]*)', africa_url_text).group(1)
current_population = africa_current_population

# africa_future_population = current_population
print(africa_current_population)

# this wasn't need in the lab 3

def chosen_continent_pop_finder(name_of_continent):
    if name_of_continent == 'Asia' or name_of_continent == 'asia':
        return name_of_continent

    elif name_of_continent == 'Africa' or name_of_continent == 'africa':
        return name_of_continent

    elif name_of_continent == 'Europe' or name_of_continent == 'europe':
        return name_of_continent

    elif name_of_continent == 'South America' or name_of_continent == 'south america':
        return name_of_continent

    elif name_of_continent == 'North America' or name_of_continent == 'north america':
        return name_of_continent

    elif name_of_continent == 'Oceania' or name_of_continent == 'oceania':
        return name_of_continent

    else:
        print("Whoops! Let's try this again")
        main()