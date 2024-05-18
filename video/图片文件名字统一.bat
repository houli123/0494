@echo off
setlocal EnableDelayedExpansion

set /a "count=1"

for %%f in (*.png) do (
    set "filename=0!count!.png"
    if !count! lss 10 (
        ren "%%f" "!filename:~1!"
    ) else (
        ren "%%f" "!filename!"
    )
    set /a "count+=1"
)

echo Renaming complete.