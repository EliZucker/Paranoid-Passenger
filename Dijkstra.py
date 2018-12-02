from collections import deque, namedtuple


Edge = namedtuple('Edge', 'start, end')


def make_edge(start, end):
    return Edge(start, end)


class Graph:
    def __init__(self, edges):
        wrong_edges = [i for i in edges if len(i) not in [2, 3]]
        if wrong_edges:
            raise ValueError('Wrong edges data: {}'.format(wrong_edges))

        self.edges = [make_edge(*edge) for edge in edges]
        self.visited = []

    @property
    def vertices(self):
        return set(
            sum(
                ([edge.start, edge.end] for edge in self.edges), []
            )
        )

    def get_neighbours(self, source):
        neighbours = []
        for edge in self.edges:
            if source == edge[0]:
                neighbours.append(edge[1])
        return neighbours

    def get_unique_paths(self, source, dest):
        paths = self.all_unique_paths_to(source, dest, [])
        total = []
        temp = []
        for x in paths:
            if x == source:
                temp = [source]
            elif x == dest:
                temp.append(x)
                if not total:
                    total = [temp[:]]
                    temp = []
                else:
                    total.append(temp[:])
                    temp = []
            else:
                temp.append(x)
        return total

    def all_unique_paths_to(self, source, dest, cur_path):
        ans = []
        if source == dest:
            cur_path.append(dest)
            return cur_path
        elif len(cur_path) > 1:
            []
        elif source not in cur_path:
            neighbors = self.get_neighbours(source)
            if neighbors:
                if not cur_path:
                    cur_path = [source]
                else:
                    cur_path.append(source)
                for x in neighbors:
                    paths = self.all_unique_paths_to(x, dest, cur_path[:])
                    if paths:
                        if not ans:
                            ans = paths
                        else:
                            for y in paths:
                                ans.append(y)
                return ans
            else:
                return ans
        else:
            return ans