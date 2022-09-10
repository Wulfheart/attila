import json
import requests
import datetime


# driftPerDay = [1]

with open("./standings.json") as file:
    standings_data = json.load(file)

    dict = {}
    i = 0
    for d in standings_data:
        for s in d['standings']:
            dict[s['player']] = d['unix_time']

    

    response = requests.post('http://127.0.0.1:8000', json={
        'contests': standings_data,
    })
    data = response.json()
    x = range(0, len(response.json()), 1)
    y = [];
    for x_i in x:
        y.append(dict[data[x_i]['player']])

    for n in response.json():
        print(n)
    # first_player = response.json()[0]
    # print(first_player, datetime.datetime.fromtimestamp(dict[first_player['player']]))
    # print("======")
    # print(response.json())
