<div x-show="currentStep === 4" class="space-y-6">
    <x-form.step-header 
        step="4" 
        total="8" 
        title="B. Utilisation de l'intelligence artificielle" 
        description="Cette section vise à recenser l'usage d'outils d'assistance numérique dans la constitution de ce dossier." 
    />

    <div class="p-4 rounded-xl border border-[#E2DBCB] space-y-4" :class="errors['used_ai_tools'] ? 'border-[#E8112D] bg-[#fff8f8]' : ''">
        <label class="block text-sm font-semibold text-[#1c1c16]">Avez-vous utilisé des outils d'intelligence artificielle pour préparer ce dossier ? <span class="text-[#E8112D]">*</span></label>
        <div class="flex items-center gap-6">
            <label class="flex items-center gap-2 text-sm cursor-pointer">
                <input type="radio" name="used_ai_tools" value="oui" x-model="formData.used_ai_tools" @change="clearError('used_ai_tools')" class="text-[#063527]"> Oui
            </label>
            <label class="flex items-center gap-2 text-sm cursor-pointer">
                <input type="radio" name="used_ai_tools" value="non" x-model="formData.used_ai_tools" @change="clearError('used_ai_tools')" class="text-[#063527]"> Non
            </label>
        </div>
        <template x-if="errors['used_ai_tools']">
            <p class="text-xs text-[#E8112D] font-medium mt-1" x-text="errors['used_ai_tools']"></p>
        </template>
    </div>

    <div x-show="formData.used_ai_tools === 'oui'" class="space-y-5">
        <!-- Type d'usage -->
        <div class="space-y-3">
            <label class="block text-sm font-semibold text-[#1c1c16]">Type d'usage (plusieurs réponses possibles)</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <x-form.checkbox-card name="ai_usage[]" value="correction_langue" label="Correction de la langue" />
                <x-form.checkbox-card name="ai_usage[]" value="traduction" label="Traduction" />
                <x-form.checkbox-card name="ai_usage[]" value="reformulation" label="Reformulation / paraphrase" />
                <x-form.checkbox-card name="ai_usage[]" value="redaction" label="Rédaction de contenu" />
                <x-form.checkbox-card name="ai_usage[]" value="recherche_documentaire" label="Recherche documentaire" />
                <x-form.checkbox-card name="ai_usage[]" value="generation_images" label="Génération d'images" />
                <x-form.checkbox-card name="ai_usage[]" value="preuves_tests" label="Production de preuves ou de tests" />
                <x-form.checkbox-card name="ai_usage[]" value="autre_usage" label="Autre usage" />
            </div>
        </div>

        <!-- Outil utilisé -->
        <div class="space-y-3">
            <label class="block text-sm font-semibold text-[#1c1c16]">Outil(s) utilisé(s) (plusieurs réponses possibles)</label>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">
                <x-form.checkbox-card name="ai_tool[]" value="ChatGPT" label="ChatGPT" />
                <x-form.checkbox-card name="ai_tool[]" value="Microsoft Copilot" label="Microsoft Copilot" />
                <x-form.checkbox-card name="ai_tool[]" value="Gemini" label="Gemini" />
                <x-form.checkbox-card name="ai_tool[]" value="Claude" label="Claude" />
                <x-form.checkbox-card name="ai_tool[]" value="DeepL" label="DeepL" />
                <x-form.checkbox-card name="ai_tool[]" value="Gamma" label="Gamma" />
                <div class="sm:col-span-3">
                    <x-form.checkbox-card name="ai_tool[]" value="Autre" label="Autre(s) outil(s)" />
                </div>
            </div>
        </div>
    </div>
</div>
