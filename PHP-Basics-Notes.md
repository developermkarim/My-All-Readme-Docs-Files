# PHP LEARNING

### Include VS Require vs Include_once vs require_once
---
* Include statement is used to execute file even if error found.It shows Warning Error Not fatal error.On the otherhand, Require statement stops by fatal error if error found.
* the file using include() can be empty.But that file using require() statement must have contents.Otherwise it will run fatal error.
* Include_once() or require_once() statement only runs a file once although the same binding with the statement.But Include() or require() statement shows the file's contents as many as the file is bounded.
### FILE HANDLING
---
* readfile() & fopen() works similar but fopen() is more useful and it contains more options than fopen().
* fopen() takes 2 parameter. 1 is file name & the other is file openning mode.
* fread() also takes the opening file and int number of how many character will read.
*. filesize() counts the total size of a file that means total character of the reading file.
* fclose() is for closing a file.

## File Open/Read
---
### file opening  modes are r, w, a, r+, w+ and more.
```bash
r mode is used for read only. w is for write only and a is also for read only but
r or w starts at the beginning of a file.On the otherhand, a mode starts at the end of a file and it crate a file if no file exist.
r+ and w+ are used for read and write only at the begining of a file but a+ at the end of a file and create a file unless the file exist.
```
###  File Reading
---
* fgets() is used to read file line by line.
* feof() is used to read from starting to end line.(file of end==foeof)
* fgetc() used for reading file one character at the beginning.

### File Writing
---
* fwrite() used to write a file only not read.So Existing content will be erased and inserted new data by 2nd parameter.

Notes: fopen(), fread() and fwrite() expect two parameter.The first is file parameter and the other is length/mode/string to be written
## File  Uploading
---
---> enctype="multipart/form-data",THis attribute will be set in html form opening tag while uploading file to server from localhost.
* file_exists() used to check a file is already exist or not.
* getimageSize($file) returns the file array result with mime.mime means file type and path extension.Such as (image/png)
## Session

## OOP(Object Oriented Programming)
