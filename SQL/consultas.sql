/*a) Encontre a MATRÍCULA(s) dos alunos com nota em BD12015-1 menor que 90;*/

select matricula
from tb_historico_academico
where
    codigo_turma = 'BD12015-1'
    and nota < 90;

/*b) Encontre a MATRÍCULA(s) e calcule a média das notas dos alunos na disciplina de POO2015-1.*/

SELECT matricula, (
        select AVG(nota)
        FROM `tb_historico_academico`
        WHERE
            codigo_turma = 'POO2015-1'
    ) as media
FROM `tb_historico_academico`
WHERE
    codigo_turma = 'POO2015-1';

/*c) Encontre o CODIGO do professor que ministra a turma WEB2015-1.*/

select codigo_professor from tb_turma where codigo_turma='WEB2015-1';

/*d) Gere o histórico completo do aluno 2015010106 mostrando MATRICULA,CODIGO DA TURMA, CODIGO DA DISCIPLINA, CODIGO PROFESSOR, FREQUENCIA,NOTA.*/

select
    a.matricula,
    t.codigo_turma,
    d.codigo as codigo_disciplina,
    p.codigo as codigo_professor,
    ha.frequencia,
    ha.nota
from tb_alunos a
    inner join tb_historico_academico ha on ha.matricula = a.matricula
    inner join tb_turma t on t.codigo_turma = ha.codigo_turma
    inner join tb_professor p on p.codigo = t.codigo_professor
    inner join tb_disciplina d on d.codigo = t.codigo_disciplina
where a.matricula = 2015010106;