import json
import requests
import datetime


# driftPerDay = [1]
driftPerDay = [0, 0.01, 0.05, 0.1, 0.25, 0.5 , 1, 10/7]

with open("./standings.json") as file:
    standings_data = json.load(file)

    dict = {}
    i = 0
    for d in standings_data:
        for s in d['standings']:
            dict[s['player']] = d['unix_time']

    for drift in driftPerDay:
        response = requests.post('http://127.0.0.1:8000', json={
            'drift_per_day': drift,
            'contests': standings_data,
        })
        data = response.json()
        x = range(0, len(response.json()), 1)
        y = [];
        for x_i in x:
            y.append(dict[data[x_i]['player']])
        first_player = response.json()[0]
        print(first_player, datetime.datetime.fromtimestamp(dict[first_player['player']]), drift)
        print("======")
