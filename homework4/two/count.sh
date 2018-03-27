#!/bin/sh 

for file in ./orgfile/*
do
    if test -f $file
    then
	echo $file
        #cp $file ./oldfile   #cope file
    fi
    if test -d $file
    then
        echo $file 是目录
    fi
done


for i in $(ls ./orgfile); 
do
    filename="${i%.*}";

    oldFileName="./oldfile/""$filename"
    orgFileName="./orgfile/""$filename"

    if [ ! -f "$oldFileName" ];then
	cp "$orgFileName" "$oldFileName"
	echo "yes"
    fi
    
    diff -u $orgFileName $oldFileName > "changinfo/""$filename"".txt"
     #get change

    rm "$oldFileName"
    cp "$orgFileName" "$oldFileName"
	
done
