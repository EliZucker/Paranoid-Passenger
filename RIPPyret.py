from flights import Flight
import random
from Dijkstra import make_edge, Graph
from turb import calc_turbulence
from Datum import Cache
from Trip_Distance import ImportDistanceArgs
import sys

def turbulence_val(val):
    return val[1]

def create_edges(edges):
    new_list = []
    for x in edges:
        new_list.append(make_edge(x[0], x[1]))
    return new_list


def compute_weights(journey, scaling, cache):
    turbulence = 0
    distance = 0
    for x in range(1, len(journey)):
        cur = journey[x]
        last = journey[x-1]
        id = last + cur
        cached = cache.has_data(id)
        turbulence_now = 0
        if cached:
            turbulence_now = turbulence
        else:
            val = calc_turbulence(last, cur)
            print(last + ", " + cur)
            turbulence_now = val
            cache.computation_val(id, val)
        turbulence += turbulence_now
        distance += ImportDistanceArgs(last, cur)
    weighted = turbulence * scaling + distance * (1-scaling)
    return [journey, 0, distance, turbulence]

def get_max(f, loa, temp=1):
    for x in loa:
        if (f(x) > temp):
            temp = f(x)
    return temp

def sort_paths(paths, scaling, cache):
    paired_val = []
    for x in paths:
        if not paired_val:
            paired_val = [compute_weights(x, scaling, cache)]
        else:
            paired_val.append(compute_weights(x, scaling, cache))
    max_turbulence = get_max(lambda z: z[3] * scaling, paired_val)
    max_distance = get_max(lambda z: z[2] * (1 - scaling), paired_val)
    for y in paired_val:
        y[3] = y[3] / max_turbulence * scaling
        y[2] = y[2] / max_distance * (1-scaling)
        y[1] = y[3] * scaling + y[2] * (1-scaling)
    paired_val.sort(key=turbulence_val)
    return paired_val[:]


def main():
    start = "SFO"#sys.argv[0]
    dest = "LGB"#sys.argv[1]
    scaling = 0.5#sys.argv[2]
    if (scaling<.1):
        scaling = .1
    if (scaling > .9):
        scaling = .9
    f = Flight()
    edges = f.edges
    edges = create_edges(edges)
    graph = Graph(edges)
    paths = graph.get_unique_paths(start, dest)
    cache = Cache()
    sorted_paths = sort_paths(paths, scaling, cache)
    sorted_p = []
    sorted_overall = []
    sorted_distance = []
    sorted_turbulence = []
    for x in sorted_paths:
        if not sorted_p:
            sorted_p = [x[0]]
            sorted_overall = [x[1]]
            sorted_distance = [x[2]]
            sorted_turbulence = [x[3]]
        else:
            sorted_p.append(x[0])
            sorted_overall.append(x[1])
            sorted_distance.append(x[2])
            sorted_turbulence.append(x[3])
    print sorted_p
    print sorted_overall
    print sorted_distance
    print sorted_turbulence
    return [sorted_p, sorted_overall, sorted_distance, sorted_turbulence]

if __name__ == "__main__":
    main()
