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
            if (file.endsWith('.blade.php')) {
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

    // Fix indentation / newline issues for all injected SVGs
    // For Edit, Hapus, Batal, Simpan, etc.
    
    // 1. Remove newline before <svg and replace with space
    content = content.replace(/">\n<svg/g, '"> <svg');
    
    // 2. Remove newline after </svg> and replace with space
    // e.g. </svg>\nEdit</a> -> </svg> Edit</a>
    content = content.replace(/<\/svg>\n(Edit|Hapus|Batal|Detail & Proses|Simpan|Simpan Akun|Simpan Data|Simpan Berita|Simpan Galeri|Simpan Produk|Simpan Kategori|Simpan Mitra|Simpan Perubahan|Update|Publish)/gi, '</svg> $1');

    if (content !== original) {
        fs.writeFileSync(file, content, 'utf8');
        console.log('Formatted', file);
    }
});
