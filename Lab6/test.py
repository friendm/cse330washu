from student import *

f = open('grades.txt', 'r')
# read the first line
var = f.readline()
vlist = var.split(',')

num_lab = vlist[0]
num_test = vlist[1]
labw = vlist[2]
studenttest = Student('Mike','Friend')
studentlist = []



for line in f:
    newline = line.split('\t')
    first = newline[0]
    last = newline[1]
    grade =int(newline[2])
    type = newline[3].lstrip()
    type=type.rstrip()	
   # print first+":"+last
   # print grade
   # print type
    studentreal=False
    for item in studentlist:
   
        if first == item.first and last == item.last: #tests if the student object already exists
            studentreal=True
            if len(type) == 4:
               # print item.first+":"+str(grade)+":"+"added test to current"
                item.add_test(grade)
            else:	
             #   print "added lab to current"
                item.add_lab(grade)

    if not studentreal:
        tempstudent=Student(first,last)    #creates a new student object
        if len(type) == 4:
           # print item.first+":"+":"+str(grade)+":"+"added test to new"
            tempstudent.add_test(grade)
        else:
          #  print "added lab to new"
            tempstudent.add_lab(grade)	
	studentlist.append(tempstudent)         #adds the new student to the list


#sorts the list by last name
sortedlist=sorted(studentlist, key=lambda Student: Student.last)
#prints out the sorted list
for item in sortedlist:
    grade=item.grade(labw)
  #this assigns a letter based on a number
    letter='z'
    if grade > 50:
        letter = 'F'
    if grade > 60:
       letter = 'D'
    if grade > 70:
       letter = 'C'
    if grade > 80:
       letter = 'B'
    if grade > 90:
       letter = 'A'
    print item.first+":"+item.last+":"+letter


