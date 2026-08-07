const fs = require('fs');
const path = require('path');

const walkSync = function(dir, filelist) {
    let files = fs.readdirSync(dir);
    filelist = filelist || [];
    files.forEach(function(file) {
        if (fs.statSync(path.join(dir, file)).isDirectory()) {
            filelist = walkSync(path.join(dir, file), filelist);
        }
        else {
            if (file.endsWith('.blade.php') && file.includes('index')) {
                filelist.push(path.join(dir, file));
            }
        }
    });
    return filelist;
};

const files = walkSync('/Users/a123/Documents/Website Desa Cigalontang/Portal Desa Cigalontang/resources/views/admin');

files.forEach(file => {
    let content = fs.readFileSync(file, 'utf8');
    let original = content;

    // Replace the td containing actions to prevent wrapping
    content = content.replace(
        /<td class="px-6 py-4 text-right">(\s*<a href="[^"]+" class="inline-flex)/g,
        '<td class="px-6 py-4 text-right whitespace-nowrap flex justify-end gap-2 items-center">$1'
    );
    // Also if it doesn't have an a tag but has form:
    content = content.replace(
        /<td class="px-6 py-4 text-right">(\s*<form)/g,
        '<td class="px-6 py-4 text-right whitespace-nowrap flex justify-end gap-2 items-center">$1'
    );
    
    // Some might have flex already like in mitra: `<td class="px-6 py-4 text-right flex justify-end gap-3">`
    // I can just replace `text-right"` to `text-right whitespace-nowrap"` but that might affect all right aligned cells.
    
    // Instead of complex regex, let's just make the action cells flex.
    // I will replace `<td class="px-6 py-4 text-right">` with `<td class="px-6 py-4 text-right whitespace-nowrap border-b-0">` Wait, td flex can cause border issues sometimes. Let's just use `whitespace-nowrap`.

    content = content.replace(
        /<td class="px-6 py-4 text-right">(\s*<a href="[^"]+" class="inline-flex|<form)/g,
        '<td class="px-6 py-4 text-right whitespace-nowrap">$1'
    );
    
    // Also remove the `mr-2` from the Edit buttons since they might cause uneven spacing if we use gap or if it's just plain text. Wait, mr-2 is fine for spacing.
    
    // And for the "Waktu Pelaksanaan" issue in Berita:
    // "Kegiatan Ronggeng Tahunan..." has a very long date that might be pushing the title column width.

    if (content !== original) {
        fs.writeFileSync(file, content, 'utf8');
        console.log('Fixed TD', file);
    }
});
