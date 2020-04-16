from lxml import etree
from random import randint, choice

def parseXML(xmlFile):
    """
    Парсинг XML
    """
    sentence = str()
    elems = [list() for i in range(10)]

    with open(xmlFile) as fobj:
        xml = fobj.read()
    
    root = etree.fromstring(xml)
    
    for appt in root.getchildren():
        for index, elem in enumerate(appt.getchildren()):
            if not elem.text:
                text = "None"
            else:
                elems[index].append(elem.text)
            
            # print(elem.tag + " => " + text)
    print("Final sentence")
    for i in range(10):
        sentence += choice(elems[i]) + ' '
    return sentence
if __name__ == "__main__":
    print(parseXML("work.xml"))