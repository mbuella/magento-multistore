How to export product images:
1. Check the base_image value (and other image fields) for the prefixed directory name in the local server.
2. The pattern would be {/x/y/***.jpg}.
3. Go to pub/media/catalog/product folder.
4. Copy 'x' folder/s to migration/content/products/media

How to import product images:
1. Go to System->Data Transfer->Import.
2. Select entity type as 'Products'.
3. Select file to import from migration/content/products/data/***.csv
4. Put 'migration/content/products/media' as Images File Directory.
5. Press 'Check Data', then 'Import' button when shows up.