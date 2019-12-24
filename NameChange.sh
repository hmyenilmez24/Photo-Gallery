#!/bin/bash
for file in /Applications/MAMP/htdocs/fetchspor/*.jpg ; do mv "$file" "${file%%}spor.jpg" ; done
for file in /Applications/MAMP/htdocs/fetchspor/*.png ; do mv "$file" "${file%%}spor.png" ; done

for file in /Applications/MAMP/htdocs/fetcharaba/*.jpg ; do mv "$file" "${file%%}arab.jpg" ; done
for file in /Applications/MAMP/htdocs/fetcharaba/*.png ; do mv "$file" "${file%%}arab.png" ; done

for file in /Applications/MAMP/htdocs/fetchtedu/*.jpg ; do mv "$file" "${file%%}tedu.jpg" ; done
for file in /Applications/MAMP/htdocs/fetchtedu/*.png ; do mv "$file" "${file%%}tedu.png" ; done

for file in /Applications/MAMP/htdocs/fetchbilim/*.jpg ; do mv "$file" "${file%%}bili.jpg" ; done
for file in /Applications/MAMP/htdocs/fetchbilim/*.png ; do mv "$file" "${file%%}bili.png" ; done
