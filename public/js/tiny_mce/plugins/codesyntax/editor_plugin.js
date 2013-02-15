tinymce.create('tinymce.plugins.CodeSyntaxPlugin', {
    createControl: function(n, cm) {
        switch (n) {
            case 'codeformat':
                var mlb = cm.createListBox('codeformat', {
                    title: 'Format Code',
                    onselect: function(v) {
                        var content = new String(tinyMCE.activeEditor.selection.getContent());
                        content = content.replace(/<(p)([^>]*)>/g, '');
                        content = content.replace(/<\/(p)>/g, '');
                        //content = content.replace(/\/(&nbsp;)/g, '\n\r');

                        tinyMCE.activeEditor.selection.setContent('<pre id=\'code\' name=code class="brush:' + v + '">' + content + '</pre>');
                    }
                });

                // Add some values to the list box
                mlb.add('BASH', 'bash');
                mlb.add('PHP', 'php');
                mlb.add('SQL', 'sql');
                mlb.add('CSS', 'css');
                mlb.add('JavaScript', 'javascript');
                mlb.add('Html', 'xhtml');             

                // Return the new listbox instance
                return mlb;
        }

        return null;
    },

    getInfo: function() {
        return {
            longname: 'Code Syntax Plugin',
            author: 'Jacobus Meintjes',
            authorurl: 'http://www.phoenixcode.net',
            infourl: 'http://alexgorbatchev.com/wiki/SyntaxHighlighter',
            version: '1.0'
        };
    }
});

    // Register plugin with a short name
    tinymce.PluginManager.add('codesyntax', tinymce.plugins.CodeSyntaxPlugin);