#import useful functions
from math import pi, sqrt
#ierarchy  cube->cylindr->tetraedr
class Cube:
    #base class
    def __init__(self, a):
        self.a = a
    #get cube volume
    
    def volume(self):
        return self.a ** 3
    #get cube area
        
    def area(self):
        return 6 * self.a ** 2
    #get set self.a 
    
    def set_side(self, a):
        self.a = a
    #get cube info
    
    def __repr__(self):
        print(f"Current side is: {self.a}")

class Cylindr(Cube):
    def __init__(self,a, h):
        super().__init__(a)
        self.h = h
    #get cyl volume
    def volume(self):
        return self.a ** 2 * pi * self.h
    #get cyl side_area
    def side_area(self):
        return 2 * pi * self.a * self.h
    #set cyl height
    def set_height(self, h):
        self.h = h
    #get cyl full area
    
    def full_area(self):
        return 2 * pi * self.a * (self.a + self.h)
    #get cyl info
    def __repr__(self):
        print(f"Current radius is: {self.a} \nCurrent height is {self.h}")


class Tetraedr(Cylindr):
    #initialize class
    def __init__(self,a ,h):
        #get params from cyl
        super().__init__(a, h)
    #overriden method of full_area
    def full_area(self):
        return self.a * sqrt(3)
    #get tetr volume
    def volume(self):
        return (self.a ** 2) / (6 * sqrt(2))
    #overriden method of side_area
    def side_area(self):
        return (self.a ** 2 * sqrt(3)) / 4
    #get tetr info
    def __repr__(self):
        print(f"Current side is: {self.a} \nCurrent height is {self.h}")


#get base params for classes
side = int(input("Iput cube side and cylindr radius: "))
height = int(input("Iput height: "))

#init classes
cube = Cube(side)
cylindr = Cylindr(side, height)
tetraedr = Tetraedr(side, height)


#full operations with classes and methods
def cube_operations():
    cube.__repr__()
    print("area: ",cube.area())
    print("volume: ",cube.volume())
    cube.set_side(4)


def cyl_operations():
    cylindr.__repr__()
    print("volume: ",  cylindr.volume())
    print("side_area: ",cylindr.side_area())
    print("area: ",cylindr.area())
    cylindr.set_side(5)
    cylindr.set_height(3)


def tetr_operations():
    tetraedr.__repr__()
    print("volume: ",  tetraedr.volume())
    print("side_area: ",tetraedr.side_area())
    print("area: ",tetraedr.full_area())
    tetraedr.set_side(5)
    tetraedr.set_height(3)



def choose_option():
    #main_loop with options
    while True:
        choice = int(input("""Input option:
            1. work with cube
            2. work with cylindr
            3. work with tetraedr   
        """))
        if choice == 1:
            cube_operations()
        elif choice == 2:
            cyl_operations()
        elif choice == 3:
            tetr_operations()

choose_option()