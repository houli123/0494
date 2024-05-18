import os
import re

def rename_images_sequentially():
    files = os.listdir('.')
    image_files = [file for file in files if re.search(r'(\\.png|\\.jpg|\\.jpeg|\\.gif)$', file, re.I)]
    
    image_files.sort()
    
    for index, file in enumerate(image_files):
        new_name = f'{str(index + 1).zfill(2)}.png'
        os.rename(file, new_name)
        print(f'Renamed {file} to {new_name}')

rename_images_sequentially()