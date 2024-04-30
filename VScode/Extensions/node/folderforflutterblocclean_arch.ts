import * as vscode from 'vscode';
import * as fs from 'fs-extra';
import * as path from 'path';

export function activate(context: vscode.ExtensionContext) {
    let disposable = vscode.commands.registerCommand('extension.createCleanArchFolders', () => {
        createCleanArchFolders();
    });

    context.subscriptions.push(disposable);
}

async function createCleanArchFolders() {
    const workspaceFolders = vscode.workspace.workspaceFolders;
    if (!workspaceFolders) {
        vscode.window.showErrorMessage('No workspace opened.');
        return;
    }

    for (const folder of workspaceFolders) {
        const rootPath = folder.uri.fsPath;
        const foldersToCreate = [
            'data/datasources',
            'data/models',
            'data/repositories',
            'domain/repositories',
            'domain/usecases',
            'presentation/bloc',
            'presentation/pages'
        ];

        for (const folderName of foldersToCreate) {
            await fs.ensureDir(path.join(rootPath, folderName));
        }
    }

    vscode.window.showInformationMessage('Clean architecture folders created.');
}
