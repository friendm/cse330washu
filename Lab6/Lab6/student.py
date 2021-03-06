class Student(object):
	def __init__(self, first, last):
		self.first = first
		self.last = last
		self.test = []
		self.lab = []

	def add_test(self, test):
        """
        Adds to the test list
        """
		self.test.append(test)
 
	def add_lab(self,lab):
        """
        Adds to the lab list
        """
		self.lab.append(lab)

	def grade(self, labw):
        """
        Takes in the lab weight
        """
		labav = sum(self.lab) / len(self.lab)
		testav =sum(self.test) / len(self.test)
		return (labw * labav) + ((1 - labw) * testav)

