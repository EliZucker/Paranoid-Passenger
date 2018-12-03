class Cache:
    def __init__(self):
        self.data = []

    def has_data(self, inp):
        if not self.data:
            []
        else:
            for x in self.data:
                if x[0] == inp:
                    return x[1]
            return []

    def computation_val(self, inp, output):
        new_cache = [inp, output]
        if not self.data:
            self.data = [new_cache]
        else:
            self.data.append(new_cache)