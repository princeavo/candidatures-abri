<div x-show="currentStep === 7" class="space-y-6">
    <x-form.step-header 
        step="7" 
        total="8" 
        title="7. Propriété intellectuelle et modèle de marché" 
        description="Protection des droits, sources de revenus et positionnement sur le marché (Rubriques 5 et 6)." 
    />

    <div class="space-y-4">
        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2">Rubrique 5 : Propriété intellectuelle</p>

        <!-- Q15 Types de PI -->
        <div class="space-y-3">
            <label class="block text-sm font-semibold text-[#1c1c16]">Q15. Droits de propriété intellectuelle détenus (cochez ceux qui s'appliquent)</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <x-form.checkbox-card name="ip_types[]" value="brevet_invention" label="Brevet d'invention" />
                <x-form.checkbox-card name="ip_types[]" value="marque" label="Marque" />
                <x-form.checkbox-card name="ip_types[]" value="indication_geographique" label="Indication géographique" />
                <x-form.checkbox-card name="ip_types[]" value="secret_commercial" label="Secret commercial ou industriel" />
                <x-form.checkbox-card name="ip_types[]" value="droit_auteur" label="Droit d'auteur" />
                <x-form.checkbox-card name="ip_types[]" value="obtention_vegetale" label="Obtention végétale" />
                <x-form.checkbox-card name="ip_types[]" value="topographie_circuit" label="Topographie de circuit intégré" />
                <x-form.checkbox-card name="ip_types[]" value="dessin_modele" label="Dessin ou modèle industriel" />
            </div>
            <x-form.file-upload name="ip_proof" label="Joindre la copie du titre de propriété intellectuelle (Q15)" icon="verified" />
        </div>

        <!-- Q16 Valorisation / Licence -->
        <div>
            <x-form.textarea name="valorization_potential" label="Q16. Potentiel de valorisation, de licence ou de transfert de technologie" rows="2" placeholder="Décrivez les perspectives de licence, de transfert ou de cession de technologie..." model="formData.valorization_potential" />
            <div class="mt-2">
                <x-form.file-upload name="valorization_proof" label="Joindre une preuve de valorisation / accord de licence (Q16)" icon="handshake" />
            </div>
        </div>

        <p class="text-xs font-bold uppercase tracking-wider text-[#52625A] border-b border-[#f1eee5] pb-2 pt-2">Rubrique 6 : Modèle économique et marché</p>

        <!-- Q17 Sources de revenus avec checkboxes -->
        <div class="space-y-3">
            <label class="block text-sm font-semibold text-[#1c1c16]">Q17. Sources de revenus de votre solution</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5">
                <x-form.checkbox-card name="revenue_types[]" value="vente_directe" label="Vente directe" />
                <x-form.checkbox-card name="revenue_types[]" value="location" label="Location" />
                <x-form.checkbox-card name="revenue_types[]" value="abonnement" label="Abonnement" />
                <x-form.checkbox-card name="revenue_types[]" value="prestation_service" label="Prestation de service" />
                <x-form.checkbox-card name="revenue_types[]" value="licence_technologie" label="Licence de technologie" />
                <x-form.checkbox-card name="revenue_types[]" value="autre_revenu" label="Autre" />
            </div>
            <x-form.input name="unit_price" label="Prix unitaire ou tarif indicatif" placeholder="Ex: 5 000 FCFA / unité, 2 000 FCFA / mois..." model="formData.unit_price" />
        </div>

        <!-- Q18 Marché -->
        <div class="space-y-3">
            <label class="block text-sm font-semibold text-[#1c1c16]">Q18. Taille et caractéristiques du marché cible</label>
            <div>
                <label class="block text-xs font-semibold uppercase text-[#52625A] mb-1">Échelle géographique visée (plusieurs choix possibles)</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2.5">
                    <x-form.checkbox-card name="market_scale[]" value="local" label="Local" description="Commune" />
                    <x-form.checkbox-card name="market_scale[]" value="national" label="National" description="Bénin" />
                    <x-form.checkbox-card name="market_scale[]" value="uemoa_cedeao" label="UEMOA / CEDEAO" />
                    <x-form.checkbox-card name="market_scale[]" value="afrique" label="Afrique" description="Continentale" />
                    <x-form.checkbox-card name="market_scale[]" value="monde" label="Monde" />
                </div>
            </div>
            <x-form.textarea name="market_size_competition" label="Taille estimée du marché et concurrence" rows="2" placeholder="Estimez le nombre de clients potentiels, la taille du marché et identifiez vos principaux concurrents..." model="formData.market_size_competition" />
            <x-form.textarea name="market_strategy" label="Stratégie de pénétration du marché" rows="2" placeholder="Décrivez votre stratégie commerciale et de distribution..." model="formData.market_strategy" />
        </div>
    </div>
</div>
