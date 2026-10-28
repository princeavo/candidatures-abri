<div x-show="currentStep === 8" class="space-y-6">
    <x-form.step-header 
        step="8" 
        total="8" 
        title="8. Ressources humaines, impact et confirmation" 
        description="Équipe, impacts mesurables, pérennité et soumission du dossier (Rubriques 7 et 8)." 
    />

    <div class="space-y-4">
        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">Rubrique 6 (suite) : Ressources humaines</p>

        <x-form.select name="team_size" label="Q19. Taille globale des ressources humaines dont vous disposez" model="formData.declaredTeamSize">
            <option value="1">Vous seul (1 personne)</option>
            <option value="2-9">Entre 2 et 9 personnes</option>
            <option value="10-49">Entre 10 et 49 personnes</option>
            <option value="50-249">Entre 50 et 249 personnes</option>
            <option value="250+">250 personnes et plus</option>
        </x-form.select>

        <!-- Q19.1 Grille RH -->
        <div class="space-y-3">
            <div class="flex items-center justify-between gap-2">
                <label class="block text-sm font-semibold text-[#1c1c16]">Q19.1. Qualifications des ressources humaines (Ventilation Hommes / Femmes)</label>
                <span class="sm:hidden text-[10px] text-[#52625A] flex items-center gap-1 shrink-0 bg-[#f1eee5] px-2 py-0.5 rounded-md">
                    <span class="material-symbols-outlined text-xs">swipe</span> Défiler
                </span>
            </div>
            <div class="overflow-x-auto border border-[#E2DBCB] rounded-xl -mx-1 sm:mx-0">
                <table class="w-full text-xs text-left min-w-[420px]">
                    <thead class="bg-[#f1eee5] text-[#52625A] font-semibold border-b border-[#E2DBCB]">
                        <tr>
                            <th class="py-2.5 px-3">Niveau de qualification</th>
                            <th class="py-2.5 px-3 w-24">Hommes</th>
                            <th class="py-2.5 px-3 w-24">Femmes</th>
                            <th class="py-2.5 px-3 w-24 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f1eee5]">
                        <template x-for="(cat, key) in hrCategories" :key="key">
                            <tr>
                                <td class="py-2 px-3 font-medium text-[#1c1c16]" x-text="cat.label"></td>
                                <td class="py-2 px-3">
                                    <input type="number" min="0" x-model.number="cat.men" @input="updateHrTotal()" :name="'hr_' + key + '_h'" class="w-20 px-2 py-1 rounded-lg border border-[#c0c8c3] text-center">
                                </td>
                                <td class="py-2 px-3">
                                    <input type="number" min="0" x-model.number="cat.women" @input="updateHrTotal()" :name="'hr_' + key + '_f'" class="w-20 px-2 py-1 rounded-lg border border-[#c0c8c3] text-center">
                                </td>
                                <td class="py-2 px-3 text-right font-bold text-[#006c4f]" x-text="cat.men + cat.women"></td>
                            </tr>
                        </template>
                    </tbody>
                    <tfoot class="bg-[#f7f3ea] font-bold border-t border-[#E2DBCB]">
                        <tr>
                            <td class="py-3 px-3">TOTAL GENERAL :</td>
                            <td class="py-3 px-3 text-[#063527]" x-text="totalMen + ' H'"></td>
                            <td class="py-3 px-3 text-[#063527]" x-text="totalWomen + ' F'"></td>
                            <td class="py-3 px-3 text-right text-[#006c4f] text-sm" x-text="grandTotal + ' pers.'"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2 pt-2">Rubrique 7 : Impact social et environnemental</p>

        <x-form.textarea name="monetization_strategy" label="Q20. Stratégie de monétisation et chiffre d'affaires" rows="2" placeholder="Décrivez votre stratégie de monétisation et vos prévisions de chiffre d'affaires..." model="formData.monetization_strategy" />
        <x-form.input name="revenue_amount" label="Chiffre d'affaires réalisé ou prévisionnel (FCFA)" placeholder="Ex: 5 000 000 FCFA prévu en année 1" model="formData.revenue_amount" />

        <div>
            <x-form.textarea name="social_impact_summary" label="Q21. Impact social (création d'emplois, éducation, santé, genre, etc.)" rows="3" placeholder="Expliquez en quoi la solution améliore les conditions de vie des populations..." model="formData.social_impact_summary" />
            <div class="mt-2">
                <x-form.file-upload name="social_impact_proof" label="Joindre une preuve d'impact social" icon="groups" />
            </div>
        </div>

        <div>
            <x-form.textarea name="environmental_impact_details" label="Q22. Impact environnemental et climatique" rows="2" placeholder="Économies d'énergie, réduction de déchets, préservation des ressources naturelles..." model="formData.environmental_impact_details" />
            <div class="mt-2">
                <x-form.file-upload name="environmental_impact_proof" label="Joindre une preuve d'impact environnemental" icon="eco" />
            </div>
        </div>

        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2 pt-2">Rubrique 8 : Pérennité et transférabilité</p>

        <x-form.textarea name="replicability" label="Q23. Votre solution est-elle réplicable dans d'autres contextes ou régions ?" rows="2" placeholder="Expliquez dans quelle mesure cette solution peut être reproduite ailleurs..." model="formData.replicability" />
        <x-form.textarea name="transferability" label="Q24. Votre solution est-elle transférable à d'autres acteurs ?" rows="2" placeholder="Décrivez les conditions dans lesquelles d'autres acteurs pourraient reprendre ou déployer la solution..." model="formData.transferability" />
        <x-form.textarea name="long_term_viability" label="Q25. La solution peut-elle être exploitée dans la durée (pérennité) ?" rows="2" placeholder="Modèle de financement durable, autonomisation, gouvernance, maintenance..." model="formData.long_term_viability" />

        <!-- Récapitulatif -->
        <div class="p-4 rounded-xl border border-[#E2DBCB] bg-[#f7f3ea]/50 space-y-2 mt-2">
            <h4 class="font-heading text-sm font-bold text-[#001e14]">Récapitulatif de votre dossier avant soumission :</h4>
            <ul class="text-xs text-[#52625A] space-y-1 list-disc pl-4">
                <li>Candidat : <span class="font-semibold text-[#1c1c16]" x-text="(formData.first_name || '') + ' ' + (formData.last_name || '')"></span></li>
                <li>Projet : <span class="font-semibold text-[#1c1c16]" x-text="formData.invention_name || '(non renseigné)'"></span></li>
                <li>Secteur : <span class="font-semibold text-[#1c1c16]" x-text="formData.sector || '(non renseigné)'"></span></li>
                <li>Équipe : <span class="font-semibold text-[#006c4f]" x-text="grandTotal + ' collaborateur(s)'"></span></li>
            </ul>
        </div>

        <!-- Avis final -->
        <div class="bg-[#E6F2EC] p-4 rounded-xl border border-[#9dbbad] text-xs text-[#001e14] flex items-center gap-3">
            <span class="material-symbols-outlined text-xl text-[#006c4f] shrink-0">info</span>
            <span>En cliquant sur « Soumettre la candidature », votre dossier sera transmis à l'ABRI et un numéro officiel de référence vous sera délivré par email.</span>
        </div>
    </div>
</div>
