<template>
  <Layout lang="fr" body-class="bg-[#EDEEF0]">
    <Preheader>
      Vous avez <span v-pre>{{ pending_modules_count }}</span> modules en
      attente de validation — connectez-vous pour les traiter.
    </Preheader>

    <Container class="max-w-[600px] bg-white">
      <Section class="bg-[#22244D] px-10 py-5">
        <Row>
          <Column>
            <span
              class="text-white text-xs font-bold tracking-[0.2em] uppercase"
            >
              GNA
            </span>
          </Column>
          <Column class="text-right">
            <span
              class="text-[#8491C7] text-[10px] tracking-[0.14em] uppercase"
            >
              Rapport hebdomadaire
            </span>
          </Column>
        </Row>
      </Section>

      <Section class="bg-[#C4A256] h-[3px]" />

      <Section class="bg-white px-10 pt-10 pb-7">
        <span
          class="inline-block text-[10px] font-bold tracking-[0.15em] uppercase px-3 py-1 rounded-[2px]"
          style="background-color: #ecfdf5; color: #065f46"
        >
          ● <span v-pre>{{ urgency_level.text }}</span> — Action requise
        </span>

        <Heading
          level="1"
          class="text-[#22244D] text-[26px] font-bold leading-tight tracking-tight mt-4 mb-2.5"
        >
          Validation des modules<br />en attente
        </Heading>

        <Text class="text-[#64748B] text-[15px] leading-relaxed m-0">
          Des activités de formation requièrent votre attention. Prenez quelques
          instants pour les valider afin de maintenir la progression de votre
          filleul.
        </Text>
      </Section>

      <Section class="bg-white px-10 pb-9">
        <Text class="text-[#1E293B] text-base leading-[1.7] mt-0 mb-6">
          Bonjour
          <strong class="font-semibold text-[#22244D]" v-pre>{{
            mentor_firstname
          }}</strong
          >,
        </Text>

        <div
          style="
            background-color: #22244d;
            border-radius: 6px;
            text-align: center;
            padding: 28px 32px;
            margin-bottom: 24px;
          "
        >
          <p
            v-pre
            style="
              font-size: 52px;
              font-weight: 800;
              color: #c4a256;
              line-height: 1;
              letter-spacing: -0.03em;
              margin: 0;
            "
          >
            {{ pending_modules_count }}
          </p>
          <p
            style="
              font-size: 11px;
              font-weight: 600;
              color: #8491c7;
              text-transform: uppercase;
              letter-spacing: 0.18em;
              margin: 10px 0 0;
            "
          >
            modules en attente de validation
          </p>
        </div>

        <table
          role="presentation"
          cellspacing="0"
          cellpadding="0"
          border="0"
          width="100%"
          style="
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 28px;
          "
        >
          <tr>
            <td
              style="
                font-size: 11px;
                font-weight: 600;
                color: #94a3b8;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                padding: 12px 20px;
                width: 38%;
                background-color: #f8fafc;
                border-right: 1px solid #e2e8f0;
                border-bottom: 1px solid #e2e8f0;
              "
            >
              Apprenant
            </td>
            <td
              style="
                font-size: 13px;
                font-weight: 500;
                color: #1e293b;
                padding: 12px 20px;
                background-color: #ffffff;
                border-bottom: 1px solid #e2e8f0;
              "
            >
              <span v-pre>{{ owner_fullname }}</span>
            </td>
          </tr>

          <tr>
            <td
              style="
                font-size: 11px;
                font-weight: 600;
                color: #94a3b8;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                padding: 12px 20px;
                background-color: #f8fafc;
                border-right: 1px solid #e2e8f0;
                border-bottom: 1px solid #e2e8f0;
              "
            >
              Priorité
            </td>
            <td
              style="
                padding: 10px 20px;
                background-color: #ffffff;
                border-bottom: 1px solid #e2e8f0;
              "
            >
              <span
                style="
                  display: inline-block;
                  font-size: 10px;
                  font-weight: 700;
                  text-transform: uppercase;
                  letter-spacing: 0.15em;
                  padding: 3px 10px;
                  border-radius: 2px;
                  background-color: #ecfdf5;
                  color: #065f46;
                "
              >
                <span v-pre>{{ urgency_level.text }}</span>
              </span>
            </td>
          </tr>

          <tr>
            <td
              style="
                font-size: 11px;
                font-weight: 600;
                color: #94a3b8;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                padding: 12px 20px;
                background-color: #f8fafc;
                border-right: 1px solid #e2e8f0;
                border-bottom: 1px solid #e2e8f0;
              "
            >
              Semaine du
            </td>
            <td
              style="
                font-size: 13px;
                font-weight: 500;
                color: #1e293b;
                padding: 12px 20px;
                background-color: #ffffff;
                border-bottom: 1px solid #e2e8f0;
              "
            >
              <span v-pre>{{ triggeredAt | date("d F Y") }}</span>
            </td>
          </tr>

          <tr>
            <td
              style="
                font-size: 11px;
                font-weight: 600;
                color: #94a3b8;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                padding: 12px 20px;
                background-color: #f8fafc;
                border-right: 1px solid #e2e8f0;
              "
            >
              Votre NNI
            </td>
            <td
              style="
                font-family: &quot;Courier New&quot;, Courier, monospace;
                font-size: 12px;
                color: #64748b;
                padding: 12px 20px;
                background-color: #ffffff;
              "
            >
              <span v-pre>{{ mentor_nni }}</span>
            </td>
          </tr>
        </table>

        <Button
          href="https://gna.papoel.fr/dashboard/{{ mentor_nni }}"
          align="center"
          class="bg-[#8491C7] text-white text-[12px] font-bold tracking-[0.08em] uppercase rounded-[3px]"
        >
          Accéder au tableau de bord
        </Button>
      </Section>

      <Hr class="bg-[#E2E8F0] mx-10 my-0" />

      <Section class="px-10 py-6">
        <Text class="text-[#94A3B8] text-xs leading-[1.7] m-0">
          Ce message est envoyé automatiquement chaque semaine lorsque des
          modules sont en attente de votre validation. Si vous pensez avoir reçu
          cet email par erreur, veuillez contacter votre référent RH.
        </Text>
      </Section>

      <Section class="bg-[#C4A256] h-px" />

      <Section class="bg-[#22244D] px-10 py-6">
        <Row>
          <Column>
            <span
              class="text-white text-[11px] font-bold tracking-[0.2em] uppercase"
            >
              Guide Nouvel Arrivant
            </span>
            <Text class="text-[#8491C7] text-[11px] mt-1 mb-0">
              Plateforme de suivi d'intégration
            </Text>
          </Column>
          <Column class="text-right" style="vertical-align: bottom">
            <Text class="text-[#8491C7] text-[11px] m-0">
              no-reply@gna.papoel.fr
            </Text>
          </Column>
        </Row>
      </Section>
    </Container>
  </Layout>
</template>
