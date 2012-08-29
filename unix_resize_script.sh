#!/bin/bash
for f in *.jpg
do
	#take image size height and width
	w=`identify -verbose $f | grep Geometry | cut -f 2 -d ':' | cut -f 1 -d 'x' | sed 's/ //g'`
	h=`identify -verbose $f | grep Geometry | cut -f 2 -d ':' | cut -f 2 -d 'x' | cut -f 1 -d '+' | sed 's/ //g'`
	if [ $w -ge $h ]
	then
	#resize original image to desired resolution and put it to /full directory
		convert -resample 96 -resize 584x393 $f ./full/$f
	#Make thumbnails (keep ratio) crop original image from center resample and resize to desired res
		a="$h"x"$h"
		convert -crop $a+0+0 $f ./thumb2/$f
		convert -resample 96 ./thumb2/$f ./thumb2/$f
		convert -resize 150x150! ./thumb2/$f ./thumb2/$f
	fi
	if [ $h -ge $w ]
	then
	#resize original image to desired resolution and put it to /full directory
		convert -resample 96 -resize 393x584 $f ./full/$f
	#Make thumbnails (keep ratio) crop original image from center resample and resize to desired res
		a="$w"x"$w"
		convert -crop $a+0+0 $f ./thumb2/$f
		convert -resample 96 ./thumb2/$f ./thumb2/$f
		convert -resize 150x150! ./thumb2/$f ./thumb2/$f
	fi
	#Make thumbnails (don't keep ratio) - simple resize
convert -resample 96 -resize 150x150! $f ./thumb/$f
done
