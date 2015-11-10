#!/usr/bin/env python

BLOGS = ["A", "B", "C"]
NO_OF_PARAGRAPHS = 5
NO_OF_IMAGES = 5
paragraphs = {}
images = {}

import itertools

print "\nassigning names to paragraphs and images:\n"

for blog in BLOGS:
  paragraphs[blog] = []
  images[blog] = []
  for para in range(0, NO_OF_PARAGRAPHS):
    para += 1
    paralabel = "p-%s-%s" % (blog, para)
    paragraphs[blog].append(paralabel)
  for img in range(0, NO_OF_IMAGES):
    img += 1
    imagelabel = "i-%s-%s" % (blog, img)
    images[blog].append(imagelabel)

for b in BLOGS:
  print "\nBlog %s:" % b
  for i in images[b]:
    print "  image %s" % i
  for p in paragraphs[b]:
    print "  para %s" % p

# now generate permutations
print "\nmaking up pairs of paragraphs and pairs of images:\n"

image_pairs = {}
para_pairs = {}

for b in BLOGS:
  para_pairs[b] = []
  image_pairs[b] = []
  print "Blog %s: " % b
  print "  Image pairs:"
  for i in [list(x) for x in itertools.combinations(images[b],2)]:
    image_pairs[b].append(i)
  print "  Paragraph pairs:"
  for p in [list(x) for x in itertools.combinations(paragraphs[b],2)]:
    para_pairs[b].append(p)

print "\nmaking up datasets (2 imgs and 2 paras):\n"

# now generate permutations of pairs
datasets = {}
for b in BLOGS:
  datasets[b] = []
  for pp in para_pairs[b]:
    for ip in image_pairs[b]:
      datasets[b].append({"para_pairs":pp,"img_pairs":ip})

real_datasets = {}

i=0
for b in BLOGS:
  real_datasets[b] = []
  for set in datasets[b]:
    i+=1
    para_1 = set["para_pairs"][0]
    para_2 = set["para_pairs"][1]
    img_1 = set["img_pairs"][0]
    img_2 = set["img_pairs"][1]
    dataset_id = "D%s" % i
    real_datasets[b].append("https://crowd.cs.vt.edu/crowdcamp/form.php?blog=%s&amp;dataset=%s&amp;data=%s,%s,%s,%s" % (b,dataset_id,str(para_1),str(para_2),str(img_1),str(img_2)))
    #print "para %s, para %s, img %s, img %s" % (str(para_1), str(para_2), str(img_1), str(img_2))

print "\nGenerated %s datasets.\n" % i

print "\nGenerating CSVs."
import csv
for b in real_datasets:
  with open("datasets-%s.csv" % b, 'wb') as csvfile:
    csvw = csv.writer(csvfile, delimiter=',',quotechar='"', quoting=csv.QUOTE_ALL)
    csvw.writerow(["url"])
    for row in real_datasets[b]:
      csvw.writerow([row])











