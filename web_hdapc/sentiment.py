from underthesea import sentiment
import sys

text=''
for i in range(1,len(sys.argv)):
	text=text+sys.argv[i]+' '
a=sentiment(text)
print(a)
