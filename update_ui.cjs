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

    // Replace Add Buttons background
    content = content.replace(
        /class="bg-primary hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-colors flex items-center gap-2"/g,
        'class="bg-slate-800 hover:bg-slate-900 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-colors flex items-center gap-2 shadow-sm"'
    );
    
    // Replace Edit (plain text) to Badge
    content = content.replace(
        /class="font-medium text-blue-600 hover:underline mr-3">\s*Edit\s*<\/a>/g,
        'class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-blue-600 transition-colors mr-2">\n<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>\nEdit</a>'
    );
    content = content.replace(
        /class="text-blue-600 hover:text-blue-800 text-sm font-medium">\s*Edit(?:\sDestinasi)?\s*<\/a>/g,
        'class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-blue-600 transition-colors mr-2">\n<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>\nEdit</a>'
    );
    // Replace Delete (plain text) to Badge
    content = content.replace(
        /class="font-medium text-red-600 hover:underline(?: mr-3)?">\s*Hapus\s*<\/button>/g,
        'class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors">\n<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>\nHapus</button>'
    );
    content = content.replace(
        /class="text-red-600 hover:text-red-800 text-sm font-medium">\s*Hapus\s*<\/button>/g,
        'class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors">\n<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>\nHapus</button>'
    );

    // Form Submit (Save) Buttons
    content = content.replace(
        />\s*(Simpan|Simpan Data|Simpan Berita|Simpan Galeri|Simpan Produk|Simpan Kategori|Simpan Mitra|Simpan Perubahan|Update|Publish)\s*<\/button>/g,
        '>\n<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>\n$1</button>'
    );
    content = content.replace(
        /class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-5 py-2\.5 text-center transition-colors"/g,
        'class="inline-flex items-center gap-2 text-white bg-slate-800 hover:bg-slate-900 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors shadow-sm"'
    );
    content = content.replace(
        /class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-5 py-3 text-center transition-colors"/g,
        'class="inline-flex items-center gap-2 text-white bg-slate-800 hover:bg-slate-900 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors shadow-sm"'
    );
    
    // Form Cancel (Batal) Buttons
    content = content.replace(
        />\s*Batal\s*<\/a>/g,
        '>\n<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>\nBatal</a>'
    );
    content = content.replace(
        /class="text-gray-500 bg-white hover:bg-gray-100 border border-gray-200 font-medium rounded-xl text-sm px-[^"]+ text-center transition-colors"/g,
        'class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors"'
    );

    // Detail Button
    content = content.replace(
        /class="font-medium text-primary hover:underline mr-3">\s*Detail & Proses\s*<\/a>/g,
        'class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-green-600 transition-colors mr-2">\n<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>\nDetail & Proses</a>'
    );

    if (content !== original) {
        fs.writeFileSync(file, content, 'utf8');
        console.log('Updated', file);
    }
});
