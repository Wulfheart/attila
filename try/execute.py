from array import array
import json
import math
import requests
import datetime


# driftPerDay = [1]

with open("./standings.json") as file:
    standings_data = json.load(file)

    now = datetime.date.fromisoformat("2022-09-11")
    dict = {}
    i = 0
    for d in standings_data:
        for s in d['standings']:
            dict[s['player']] = d['unix_time']

    # driftPerDay = [0, 0.01, 0.05, 0.1, 0.25, 0.5 , 1, 10/7]
    driftPerDay = [0]
    users = {}
    for drift in driftPerDay:
        response = requests.post('http://127.0.0.1:8000', json={
            'contests': standings_data,
            'drift_per_day': drift
        })
        data: array = response.json()
        x = range(0, len(response.json()), 1)
        y = [];


        # Subtract the drift 
        # if 0 a player gets unranked
        dic = {}
        for d in data:
            last_activity = datetime.date.fromtimestamp(d['last_activity'])
            diff = now - last_activity
            newRating = max(0, d['display_ranking'] - (diff.days * 0.1))
            dic[d['player']] = {'old': d['display_ranking'], 'new': newRating}

        print(json.dumps(dic))
        data.sort(key=lambda x: x.get('display_ranking'))

        for rank, d in enumerate(data):
            if not users.get(d['player']):
                users[d['player']] = {}
            users[d['player']][drift] = rank


    # print(json.dumps(users))
