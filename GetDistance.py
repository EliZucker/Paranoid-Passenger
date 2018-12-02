
from Trip_Distance import JetBlueDatum
from Trip_Distance import calc_dist
class Point:
    def __init__(self, x, y):
        self.x = x
        self.y = y


def get_closest_airport(origin):
    name = []
    closest = -1
    for key, val in JetBlueDatum.items():
        loc = Point(val.get("lat"), val.get("lng"))
        dist = calc_dist(loc.x, loc.y, origin.x, origin.y)
        if closest == -1:
            closest = dist
            name = key
        elif dist < closest:
            closest = dist
            name = key
    return name
